<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Payment;

class EsewaController extends Controller
{
    // show checkout form
    public function checkout()
    {
        return view('checkout');
    }

    // create payment and redirect to eSewa
    public function pay(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $amount = number_format((float)$request->amount, 2, '.', '');
        $pid = uniqid('PAY_');

        // save pending payment
        $payment = Payment::create([
            'pid' => $pid,
            'amount' => $amount,
            'status' => 'pending',
        ]);

        $data = [
            'amt' => $amount,
            'pdc' => 0,
            'psc' => 0,
            'txAmt' => 0,
            'tAmt' => $amount,
            'pid' => $pid,
            'scd' => env('ESEWA_MERCHANT_CODE'),
            'su' => env('ESEWA_SUCCESS_URL'),
            'fu' => env('ESEWA_FAILURE_URL'),
        ];

        // show auto-submitting form that sends user to eSewa
        return view('esewa_payment', compact('data'));
    }

    // handle success redirect from eSewa
    public function success(Request $request)
    {
        // eSewa returns: pid (oid), refId (rid), amt etc.
        $refId = $request->refId ?? $request->rid ?? null;
        $oid = $request->oid ?? $request->pid ?? null;
        $amt = $request->amt ?? null;

        if (!$oid || !$refId || !$amt) {
            return redirect()->route('checkout')->with('error', 'Missing payment data from eSewa.');
        }

        // verify server-to-server with eSewa
        $verifyUrl = "https://uat.esewa.com.np/epay/transrec"; // use production URL for live
        $payload = [
            'amt' => $amt,
            'scd' => env('ESEWA_MERCHANT_CODE'),
            'pid' => $oid,
            'rid' => $refId
        ];

        try {
            $response = Http::asForm()->post($verifyUrl, $payload);
            $body = $response->body();
        } catch (\Exception $e) {
            // network or other error
            return redirect()->route('checkout')->with('error', 'Verification request failed: ' . $e->getMessage());
        }

        // eSewa returns XML-like response that includes <result>Success</result> when ok.
        if (stripos($body, 'Success') !== false) {
            $payment = Payment::where('pid', $oid)->first();
            if ($payment) {
                $payment->update([
                    'ref_id' => $refId,
                    'status' => 'success'
                ]);
            }
            return view('payment_success', compact('payment'));
        } else {
            // mark failed
            $payment = Payment::where('pid', $oid)->first();
            if ($payment) {
                $payment->update(['status' => 'failed']);
            }
            return view('payment_failed');
        }
    }

    // handle failure redirect from eSewa
    public function failure(Request $request)
    {
        // eSewa may return pid - use to update db if available
        $oid = $request->oid ?? $request->pid ?? null;
        if ($oid) {
            $payment = Payment::where('pid', $oid)->first();
            if ($payment) $payment->update(['status' => 'failed']);
        }
        return view('payment_failed');
    }
}

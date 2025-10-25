@extends('layouts.main')
@section('title', 'orderlist')
@section('content')



    @if (session('danger'))
        <div class="alert alert-danger my-2">{{ session('danger') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <div class="py-3">
        <h1 class="text-center"> <b> order Items</b></h1>
    </div>



    <table class="table  my-2 table-hover mx-3">
        <tr>

            <td>
                <h2>Service Charge</h2>
            </td>
            <td>
                <h2>Tax</h2>
            </td>
            <td>
                <h2>Amount</h2>
            </td>
            <td>
                <h2>Total</h2>
            </td>



        </tr>

        <tr>

            <td>
                <p style="font-size: 1.5rem;">100</p>
            </td>
            <td>
                <p style="font-size: 1.5rem;">500</p>
            </td>
            <td>
                <p style="font-size: 1.5rem;">{{ $total }}</p>
            </td>

            <td>

                <p style="font-size: 1.5rem;">{{ $total + 100 + 500 }}</p>
            </td>

        </tr>
    </table>
    <div class="d-flex justify-content-center my-3">

        <form action="placeorder" method="POST">
            @csrf

            <div class="form-group">
                <textarea name="address" class="form-control"></textarea><br>
            </div>
            <div class="form-group">
                <h2>Payment Method</h2>

                <input type="radio" class='my-2'name="payment" value="online">
                <label for="online">Online Payment</label><br>

                <input type="radio" class='my-2' name="payment" value="cash">
                <label for="cash">Cash on Delivery</label><br>

            </div>

            <button class="btn btn-info my-2">Order Now</button>
        </form>
    </div>

@endsection

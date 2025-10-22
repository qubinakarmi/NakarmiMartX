@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Your Cart</h2>

    @if(session('cart') && count(session('cart')) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $item)
                @php $total += (float)$item['amount'] * (int)$item['quantity']; @endphp

                    <tr>
                        <td><img src="{{ asset('product_images/'.$item['image']) }}" width="80"></td>
                        <td>{{ $item['title'] }}</td>
                        <td>₹{{ $item['amount'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>₹{{ number_format($item['amount'] * $item['quantity']) }}</td>

                        <td><a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Remove</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4>Total: ₹{{ $total }}</h4>
        <a href="{{ route('cart.clear') }}" class="btn btn-warning">Clear Cart</a>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection

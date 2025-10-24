@extends('layouts.main')
@section('title', 'cartlist')
@section('content')



    @if (session('danger'))
        <div class="alert alert-danger">{{ session('danger') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <div class="py-3">
        <h1 class="text-center"> <b> Cart Items</b></h1>
    </div>

    <table class="table  my-2 table-hover">
        <tr>
            <td>
                <h2>Image</h2>
            </td>
            <td>
                <h2>Title</h2>
            </td>
            <td>
                <h2>Amount</h2>
            </td>
            <td>
                <h2>Action</h2>
            </td>



        </tr>
        @foreach ($products as $product)
            <tr>
                <td> <img src="{{ asset('product_images/' . $product->image) }}" class="card-img-top"
                        alt="{{ $product->title }} " style="width: 100px; height:100px;">
                </td>
                <td>
                    <p style="font-size: 1.5rem;">{{ $product->title }}</p>
                </td>
                <td>
                    <p style="font-size: 1.5rem;">{{ $product->amount }}</p>
                </td>



                <td>
                    <a href="{{ url('cart/delete/' . $product->id) }}" class="btn btn-outline-danger">
                        <i class="fa-solid fa-trash"> </i>
                    </a>
                </td>

            </tr>
        @endforeach
    </table>















    {{-- <section class="my-3">
        <div class="container">
            <div>
                <hr><h1 class="text-center"><i class="fa-solid fa-layer-group"></i>Cart Item</h1><hr>
            </div>
     

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('product_images/' . $product->image) }}" class="card-img-top"
                                alt="{{ $product->title }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">₹{{ $product->amount }}</p>
                                
                            </div>
                        </div>
                    </div>

                    @endforeach
             
            </div>

        </div>
    </section> --}}
@endsection

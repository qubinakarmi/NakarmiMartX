@extends('layouts.main')
@section('title','Search page')
@section('content')
    @if (session('success'))
        <div>
            <span class="alert alert-success" role="alert"> {{ session('success') }}</span>
        </div>
    @endif






    <section class="my-3">
        <div class="container">
            <div>
                <hr><h1 class="text-center"><i class="fa-solid fa-layer-group"></i>Searched Item</h1><hr>
            </div>
    

            <div class="row d-flex justify-content-center">
                @forelse ($products as $product)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('product_images/' . $product->image) }}" class="card-img-top"
                                alt="{{ $product->title }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">₹{{ $product->amount }}</p>

                              <form action="{{ route('add.cart.item') }}" method="Post">
                                @csrf

                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i>Add to cart</button>
                                </form>
                             
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">No  products found.</p>
                @endforelse
            </div>

        </div>
    </section>

   <div class="my-3 d-flex justify-content-center ">
  <ul class="pagination pagination-lg" style="font-size: :1.2rem;">
        {{ $products->links() }}
    </ul>
    </div> 
@endsection

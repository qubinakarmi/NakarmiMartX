@extends('layouts.main')
@section('content')
    @if (session('success'))
        <div>
            <span class="alert alert-success" role="alert"> {{ session('success') }}</span>
        </div>
    @endif
 
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
            aria-label="Slide 4"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        <!-- Electronics Banner -->
        <div class="carousel-item active position-relative">
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1920&q=80"
                class="d-block w-100 carousel-img" alt="Electronics Sale">
            <div class="overlay"></div>
            <div class="carousel-caption d-none d-md-block">
                <h2 class="fw-bold text-light">Upgrade Your Tech Today</h2>
                <p class="text-light">Exclusive discounts on the latest gadgets</p>
            </div>
        </div>



        <!-- Home Decor Banner -->
        <div class="carousel-item position-relative">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80"
                class="d-block w-100 carousel-img" alt="Home Essentials">
            <div class="overlay"></div>
            <div class="carousel-caption d-none d-md-block">
                <h2 class="fw-bold text-light">Make Your Home Shine</h2>
                <p class="text-light">Beautiful decor and furniture at great prices</p>
            </div>
        </div>

        <!-- Mega Sale Banner -->
        <div class="carousel-item position-relative">
            <img src="https://images.unsplash.com/photo-1585386959984-a4155224a1ad?auto=format&fit=crop&w=1920&q=80"
                class="d-block w-100 carousel-img" alt="Mega Sale">
            <div class="overlay"></div>
            <div class="carousel-caption d-none d-md-block">
                <h2 class="fw-bold text-light">Mega Festive Sale!</h2>
                <p class="text-light">Up to 70% off on all top brands</p>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>






    <section class="my-3">
        <div class="container">
            <div>
                <hr><h1 class="text-center"><i class="fa-solid fa-layer-group"></i>Top Deals</h1><hr>
            </div>
    

            <div class="row d-flex justify-content-center">
                @forelse ($products as $product)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('product_images/' . $product->image) }}" class="card-img-top hover-shadow"
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
    <div class="d-flex justify-content-center my-3">
        {{ $products->links() }}
    </div>
@endsection

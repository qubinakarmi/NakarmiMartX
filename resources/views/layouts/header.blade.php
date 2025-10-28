<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'NakarmiMartX')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>



<body>

    <?php 
        use App\Http\Controllers\CartController;
        $total=CartController::cartItem();
?>  

  <nav class="navbar navbar-expand-lg theme-blue">
    <div class="container">
        <!-- Logo / Brand -->
    
    <img src="{{ asset('assets/images/nakarmimartx.svg') }}" alt="NakarmiMartX Logo" width="200px" class="me-2">
</a>


        <!-- Mobile Toggler -->
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Nav Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('contact') }}">Contact</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('myorder') }}">Orders</a>
                </li>
            </ul>

            <!-- Center Search Bar -->
            <form  action="{{ route('search') }}"class="d-flex me-3" role="search" method="GET">
            
                <div class="input-group">
                    <input class="form-control form-control-sm" style="width: 300px;" type="search"
                        placeholder="Search for products" aria-label="Search" name="search" value="{{ old('search') }}">
                    <button class="btn btn-light btn-sm text-secondary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>

            <!-- Right Buttons -->
            <div class="d-flex align-items-center">
                <a href="#" class="text-decoration-none text-light me-3">Become Seller</a>

                <a class="btn theme-green-btn btn-sm text-light me-2" href="{{ route('cart.list') }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Cart({{ $total }})
                </a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn theme-orange-btn btn-sm text-light rep">
                            <i class="fa-solid fa-user"></i>
                            Dashboard 
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn theme-orange-btn btn-sm text-light">
                            <i class="fa-solid fa-user"></i> Login
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>


    {{-- secondary nav --}}

<!-- Secondary Navbar -->
<nav class="navbar navbar-expand-lg theme-navbar-light">
    <div class="container">
        <!-- Toggler Button for Small Screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#secondaryNavbar"
            aria-controls="secondaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Menu -->
        <div class="collapse navbar-collapse justify-content-center" id="secondaryNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('category','mobiles') }}" class="nav-link text-dark mx-2">Mobiles</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category','fashions') }}" class="nav-link text-dark mx-2">Fashions</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category','electronics') }}" class="nav-link text-dark mx-2">Electronics</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category','furnitures') }}" class="nav-link text-dark mx-2">Furnitures</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category','grocery') }}" class="nav-link text-dark mx-2">Grocery</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


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

    <nav class="navbar navbar-expand-lg theme-blue">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h1 style="color: #fff8dc; font-family:Poppins;">NakarmiMartX</h1>
            </a>
            <a class="navbar-brand text-light nav-sub" href="{{ route('home') }}">
                Home
            </a>
            <a class="navbar-brand text-light nav-sub" href="{{ route('about') }}">
                About
            </a>
            <a class="navbar-brand text-light nav-sub" href="{{ route('contact') }}">
                Contact
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div>
                <form class="d-flex" role="search">
                    <div class="input-group">
                        <input class="form-control form-control-sm " style="width:350px;" type="search"
                            placeholder="Search for products" aria-label="Search" />
                        <button class="btn btn-light btn-sm text-secondary" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>

                    </div>

                </form>
            </div>

            <div>
                <a href="1" class="text-decoration-none text-light">Become seller</a>


                <a class="btn theme-green-btn btn-sm text-light" href="">
                    <i class="fa-solid fa-cart-shopping"></i> Cart ({{ count(session('cart', [])) }})
                </a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn theme-orange-btn btn-sm text-light"><i
                                class="fa-solid fa-user"></i>Dashboard <i class="fa-solid fa-circle"
                                style="color: green;"></i></a>
                    @else
                        <a href="{{ route('login') }}" class="btn theme-orange-btn btn-sm text-light"><i
                                class="fa-solid fa-user"></i>login </a>


                    @endauth
                @endif


            </div>
        </div>
    </nav>

    {{-- secondary nav --}}

    <nav class="navbar navbar-expand-lg theme-navbar-light">
        <div class="container-fluid ">

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('mobiles') }}"
                            class="nav-link active text-dark mx-2">Mobiles</a>
                    </li>

                    <li class="nav-item">
                        {{-- <a class="nav-link active text-dark" href="#">Fashions</a> --}}
                        <a href="{{ route('fashions') }}"
                            class="nav-link active text-dark mx-2">Fashions</a>

                    </li>
                    <li class="nav-item">

                        <a href="{{ route('electronics') }}"
                            class="nav-link active text-dark mx-2">Electronics</a>

                    </li>

                    <li class="nav-item">

                        <a href="{{ route('furnitures') }}"
                            class="nav-link active text-dark mx-2">Furnitures</a>


                    </li>

                    <li class="nav-item">

                        <a href="{{ route('grocery') }}"
                            class="nav-link active text-dark mx-2">Grocery</a>

                    </li>
                    {{-- <li class="nav-item">

                        <a href="{{ route('products.category', 'applinces') }}"
                            class="nav-link active text-dark mx-2">Applinces</a>

                    </li> --}}












                </ul>
            </div>
        </div>
    </nav>

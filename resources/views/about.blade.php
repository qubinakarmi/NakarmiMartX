@extends('layouts.main')
@section('title', 'About Page')
@section('content')
    <h1 class="text-center mt-5">About NakarmiMartX</h1>
    <hr>





    <section class="main ">
        <div class="container  ">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center my-3" >
                    <img src="{{ asset('assets/images/main.jpg') }}" alt=""class="img-fluid" style="height: 300px; width:500px;">

                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 my-3">
                    <p class="m-0 text-dark" style="font-size: 1.2rem;"> <b
                            style="color: rgb(217, 141, 19);">NakarmiMartX</b> is one of the rapidly emerging
                        e-commerce platforms in Nepal, dedicated to transforming the way people shop online.
                        It offers a wide range of products — from electronics and fashion to home essentials and gadgets —
                        all in one convenient platform.
                        Established by <b>Qubi Nakarmi</b>, a Computer Science graduate passionate about technology and
                        innovation,
                        NakarmiMartX aims to create a seamless digital shopping experience that combines affordability,
                        quality, and customer satisfaction.
                        With a user-friendly interface, secure payment system, and fast delivery services, NakarmiMartX
                        continues to grow as one of Nepal’s most trusted online marketplaces.</p>

                </div>
            </div>
        </div>
    </section>


    </div>











@endsection

@extends('layouts.main')
@section('title', 'Contact Page')
@section('content')



    @if (session('success'))
        <div class="alert alert-success my-2">
            {{ session('success') }}
        </div>
        @endif
        <div class="container">
            <div class="row  ">
                <div class="col-md-12">
                    <form action="{{ route('contact') }}"class="mt-5 mx-3" method="POST">
                        @csrf
                        <h1 class="text-center"><b>Send us message</b></h1>
                        <div class="form-group">
                            <label for="email"><b>Email address:</b></label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone"><b>Phone number:</b></label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter phone number"
                                name="phone">
                        </div>
                        <div class="form-group">
                            <label for="address"><b>Address:</b></label>
                            <input type="address" class="form-control" id="phone" placeholder="Enter address"
                                name="address">
                        </div>


                        <div class="form-group">
                            <label for="message"><b>Message:</b></label>
                            <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                        </div>
                        {{-- <div class="form-check pl-5 pt-3 pb-3 mx-2">
                <input type="checkbox" class="form-check-input" id="agree">
                <label class="form-check-label " for="agree">I agree to the terms and conditions</label>
               </div> --}}
                        <div> <button type="submit" class="btn btn-primary my-2">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="fw-bold mb-3 text-center">Contact Information</h1>

                    <p class="mb-3 text-center" style="font-size: 18px;">
                        Please contact us at the given mobile number or reach out via social media — we are always active.
                    </p>

                    <p class="mb-4 text-center">
                        <i class="fas fa-map-marker-alt me-2 text-primary"></i> Thamel, Kathmandu, Nepal<br>
                        <i class="fas fa-phone me-2 text-primary"></i> +977-98487321<br>
                        <i class="fas fa-envelope me-2 text-primary"></i> nakarmimartx@gmail.com
                    </p>

                    <div class="social-media mt-3 d-flex align-item-center justify-content-center">
                        <a href="#" class="me-3 text-dark"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#" class="me-3 text-dark"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="me-3 text-dark"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-dark"><i class="fab fa-linkedin-in fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div id="map" class="shadow-lg rounded overflow-hidden" style="width: 100%; height: 500px;">
                        <iframe class="w-100 h-100 border-0"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7064.147533277565!2d85.30712124232363!3d27.715008604712313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcb77fd4bd%3A0x58099b1deffed8d4!2sThamel%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1719418321778!5m2!1sen!2snp"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>















    @endsection

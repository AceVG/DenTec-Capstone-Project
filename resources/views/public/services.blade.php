@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Services</h1>
                <a href="/" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="services" class="h4 text-white">Services</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-12">
                    <div class="section-title mb-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Services</h5>
                        <h1 class="display-5 mb-0">We Offer The Best Quality Dental Services</h1>
                    </div>
                    <div class="row g-5">
                        @foreach ($services as $service)
                            <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.6s">
                                <div class="rounded-top overflow-hidden">
                                    <img class="img-fluid" src="{{ $service->photo }}" alt="">
                                </div>
                                <div class="position-relative bg-light rounded-bottom text-center p-4">
                                    <h5 class="m-0">{{$service->name}}</h5>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.9s">
                            <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-4">
                                <h3 class="text-white mb-3">Make Appointment</h3>
                                <p class="text-white mb-3">Book your dental appointment today for a healthier smile tomorrow.</p>
                                <h2 class="text-white mb-0">0933-811-1429</h2>
                                <h2 class="text-white mb-0">0917-186-6575</h2>
                                <h2 class="text-white mb-0">(042) 660 4906</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
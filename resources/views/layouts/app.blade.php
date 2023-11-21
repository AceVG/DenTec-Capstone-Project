<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small class="py-2"><i class="far fa-clock text-primary me-2"></i>Opening Hours: Mon - Fri : 09:00 am - 04:00 pm | Sat - 9:00 am - 5:00 pm | Sun - 9:00 am - 3:00 pm </small>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>clinic.cadadental@gmail.com</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>0933-811-1429 | 0917-186-6575 | (042) 660 4906</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="/" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><i class="fa fa-tooth me-2"></i>Cada Dental Center | DenTec</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="{{ (request()->is('/')) ? 'nav-item nav-link active' : 'nav-item nav-link' }}">Home</a>
                <a href="about" class="{{ (request()->is('about*')) ? 'nav-item nav-link active' : 'nav-item nav-link' }}">About</a>
                <a href="services" class="{{ (request()->is('services*')) ? 'nav-item nav-link active' : 'nav-item nav-link' }}">Services</a>
                <a href="contact" class="{{ (request()->is('contact*')) ? 'nav-item nav-link active' : 'nav-item nav-link' }}">Contact</a>
            </div>
            <a href="appointment" class="btn btn-primary py-2 px-4 ms-3">Appointment</a>
            @auth
                <div class="dropdown">
                    <button class="btn btn-secondary py-2 px-4 ms-3 dropdown-toggle" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{route('profile.edit')}}">{{ __('Profile') }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button class="dropdown-item" type="submit">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </nav>
    <!-- Navbar End -->
    
    @yield('content')
    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light py-5 mt-0 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: -75px;">
        <div class="container pt-5">
            <div class="row g-5 pt-4">
                <div class="col-9">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>14 Allarey St., Barangay 1, Lucena, Philippines</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>clinic.cadadental@gmail.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>0933-811-1429 | 0917-186-6575 | (042) 660 4906</p>
                </div>
                <div class="col-3">
                    <h3 class="text-white mb-4">Visit our Facebook Page</h3>
                    <div class="d-flex">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="https://www.facebook.com/CadaDentalCenter" target="_blank">
                    <i class="fab fa-facebook-f fw-normal"></i>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-light py-4" style="background: #051225;">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white border-bottom" href="#">DenTec</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    @auth
    <span class="d-none">{{$adminUser = App\Models\User::where('user_type', '1')->first()}}</span>
    <div class="chat-accordion accordion shadow-lg">
        <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fa fa-message"></i>
            </button>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <iframe src="{{ url('chatify/' . $adminUser?->id . '?source=iframe') }}" style="height: 400px;"></iframe>
            </div>
        </div>
    </div>
    @endauth
</body>
</html>
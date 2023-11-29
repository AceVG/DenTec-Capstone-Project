<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/admin" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-tooth me-2"></i>DenTec</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="/admin" class="{{ (request()->is('admin') || request()->is('admin/appointments*')) ? 'nav-item nav-link active' : 'nav-item nav-link' }}"><i class="fa fa-th me-2"></i>Appointments</a>
                    <a href="/admin/dentists" class="{{ (request()->is('admin/dentists*')) ? 'nav-item nav-link active' : 'nav-item nav-link' }}"><i class="fa fa-tooth me-2"></i>Dentists</a>
                    <a href="/admin/services" class="{{ (request()->is('admin/services*')) ? 'nav-item nav-link active' : 'nav-item nav-link' }}"><i class="fa fa-list-check me-2"></i>Services</a>
                    <a href="/admin/users" class="{{ (request()->is('admin/users*')) ? 'nav-item nav-link active' : 'nav-item nav-link' }}"><i class="fa fa-user me-2"></i>Users</a>
                    <a href="/admin/reviews" class="{{ (request()->is('admin/reviews*')) ? 'nav-item nav-link active' : 'nav-item nav-link' }}"><i class="fa fa-star me-2"></i>Reviews</a>
                    <a href="/admin/messages" class="{{ (request()->is('admin/messages*')) ? 'nav-item nav-link active' : 'nav-item nav-link' }}"><i class="fa fa-message me-2"></i>Messages</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content d-flex flex-column">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="/admin" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    @auth
                        <div class="nav-item dropdown">
                            <button class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
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
            <div class="container-fluid pt-4 px-4 mt-auto">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 text-center text-sm-start">
                            &copy; <a href="/admin">DenTec</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>
</body>
</html>
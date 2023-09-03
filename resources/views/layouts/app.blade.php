<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <title>Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/homepageCSS.css') }}">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <div class="dentec">
            <p>DenTec</p>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="homepage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="messages">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogs">Blogs</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    <main role="main">
        @yield('content')
    </main>

    <footer>
    <div class="contact1">
        <p>Thank you for choosing our clinic for you dental</p>
        <p>neds, Our friendly staff is here to make sure you</p>
        <p>feel comfortable and well-cared for.</p>
        <button id="but2">Leave a Review</button>
    </div>
    </footer>
</body>
</html>
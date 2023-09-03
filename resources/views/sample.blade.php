<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="dentec">
        <p>DenTec</p>
    </div>

    <ul class="links">
        <li><a href="default.asp">Home</a></li>
        <li><a href="news.asp">Services</a></li>
        <li><a href="contact.asp">Messages</a></li>
        <li><a href="about.asp">Blog</a></li>
      </ul>

      <div class="container">
      <img src="{{ asset('images/dentalgirl.jpg') }}" id="home" alt="home page">
      <div id="text"><p>Welcome to Dentec<br></p>
        <p>Your Trusted Partner<br></p>
        <p>For Dental Care!</p>
    </div>

    <button id="but1">Book Appointment</button><br>

    <div class="about">
        <h1>About Us</h1>
    </div>


    <div class="abouttxt">
    <img src="{{ asset('images/lab.jpg') }}" alt="about" id="aboutimg">
    <p>We are modern dental clinic dedicated to providing</p>
    <p>high quality personalized care to our patients</p>
    <p>team of experience professionals is commited to</p>
    <p>creating a welcoming and comfortable environment for</p>
    <p>every patient, and we strive to deliver exceptional</p>
    <p>dental services that exceed expectations</p>
    </div><br><br><br><br><br><br><br><br>

    

    <div class="contact1">
        <p>Thank you for choosing our clinic for you dental</p>
        <p>neds, Our friendly staff is here to make sure you</p>
        <p>feel comfortable and well-cared for.</p>
        <button id="but2">Leave a Review</button>
    </div>


</body>
@extends('layouts.app')

@section('title', 'Home')

@section('content')
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

@endsection
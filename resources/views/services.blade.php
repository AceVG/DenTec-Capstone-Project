@extends('layouts.app')

@section('title', 'Services Offered')

@section('content')
    <div class="container">
        <h1>Services Offered</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>Dental Checkup</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia venenatis lectus at eleifend.</p>
            </div>

            <div class="col-md-6">
                <h2>Teeth Cleaning</h2>
                <p>Proin vel purus non risus egestas hendrerit. Integer non urna et metus convallis placerat.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h2>Fillings and Restorations</h2>
                <p>Ut at laoreet libero. Integer eu justo quis nisi placerat tincidunt. Nam vitae tortor id.</p>
            </div>

            <div class="col-md-6">
                <h2>Tooth Extraction</h2>
                <p>Morbi quis congue orci. Vivamus nec metus non nisi bibendum tristique nec sit amet tellus.</p>
            </div>
        </div>

        {{-- Add more services as needed --}}
    </div>
@endsection
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
 <!-- Table Start -->
<div class="container-fluid px-0" style="height: 100%; overflow: hidden;">
    <iframe src="{{ url('chatify') }}" style="height: 100%; width: 100%;" />
</div>
<!-- Table End -->
@endsection
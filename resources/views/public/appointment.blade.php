@extends('layouts.app')

@section('title', 'Appointment')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">About Us</h1>
                <a href="/" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="appointment" class="h4 text-white">Appointment</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Appointment Start -->
    <div class="container-fluid bg-primary bg-appointment py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-5 text-white mb-4">We Are A Certified and Award Winning Dental Clinic You Can Trust</h1>
                        <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Make Appointment</h1>
                        <form method="POST" action="{{ url('appointment') }}">
                            @csrf
        
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <label for="service_id">Service</label>
                                    <select id="service_id" name="service_id" class="form-select bg-light border-0" style="height: 55px;" required>
                                        @foreach ($services as $service)
                                        <option value="{{$service->id}}">{{$service->name}} - {{$service->duration}} hours</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('service_id')" class="text-error mt-2" />
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="phone">Your Phone</label>
                                    @auth
                                    <input id="phone" name="phone" type="text" class="form-control bg-light border-0" style="height: 55px;" required value="{{Auth::user()->phone}}">
                                    @else
                                    <input id="phone" name="phone" type="text" class="form-control bg-light border-0" style="height: 55px;" required>
                                    @endauth
                                    <x-input-error :messages="$errors->get('phone')" class="text-error mt-2" />
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="name">Your Name</label>
                                    @auth
                                    <input id="name" name="name" type="text" class="form-control bg-light border-0" style="height: 55px;" required value="{{Auth::user()->name}}">
                                    @else
                                    <input id="name" name="name" type="text" class="form-control bg-light border-0" style="height: 55px;" required>
                                    @endauth
                                    <x-input-error :messages="$errors->get('name')" class="text-error mt-2" />
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="email">Your Email</label>
                                    @auth
                                    <input id="email" name="email" type="email" class="form-control bg-light border-0" style="height: 55px;" required value="{{Auth::user()->email}}">
                                    @else
                                    <input id="email" name="email" type="email" class="form-control bg-light border-0" style="height: 55px;" required>
                                    @endauth
                                    <x-input-error :messages="$errors->get('email')" class="text-error mt-2" />
                                </div>
                                <div class="col-12">
                                    <label for="start">Date</label>
                                    <input id="start" name="start" type="datetime-local" class="form-control bg-light border-0" style="height: 55px;" required>
                                    <x-input-error :messages="$errors->get('start')" class="text-error mt-2" />
                                </div>
                                <div class="col-12">
                                    <label for="notes">Notes</label>
                                    <textarea id="notes" name="notes" type="text" class="form-control bg-light border-0" rows="3"></textarea>
                                    <x-input-error :messages="$errors->get('notes')" class="text-error mt-2" />
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Make Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->

    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-12">
                    <h1 class="display-6 mb-4">My Appointments</h1>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Status</th>
                                <th scope="col">Service</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($appointments->count() == 0)
                                <tr>
                                    <td class="text-center" colspan="5">No data to display</td>
                                </tr>
                            @endif
                            
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{$appointment->status}}</td>
                                    <td>{{$appointment->service?->name}}</td>
                                    <td>{{$appointment->start}}</td>
                                    <td>{{$appointment->end}}</td>
                                    <td>
                                        @if ($appointment->status == 'Pending')
                                        <form method="POST" action="{{ url('appointment/update') }}">
                                            @csrf
                                            
                                            <input type="hidden" name="id" value="{{$appointment->id}}}" />
                                            <input type="hidden" name="status" value="Cancelled" />
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                Cancel
                                            </button>
                                        </form>
                                        @elseif ($appointment->status == 'Completed')
                                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#review{{$appointment->id}}">
                                                Review
                                            </button>
                                            <div class="modal fade" id="review{{$appointment->id}}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form class="modal-content" method="POST" action="{{ url($reviews->where('appointment_id', $appointment->id)->first() == null ? 'review' : 'review/update') }}">
                                                        @csrf

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Create</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="{{$reviews->where('appointment_id', $appointment->id)->first()?->id}}" />
                                                            <input type="hidden" name="appointment_id" value="{{$appointment->id}}" />

                                                            <label for="rating">Rating</label>
                                                            <div class="star-cb-group">
                                                                <input type="radio" id="rating-{{$appointment->id + 5}}" name="rating" value="5" required {{$reviews->where('appointment_id', $appointment->id)->first()?->rating == 5 ? 'checked' : null}} /><label for="rating-{{$appointment->id + 5}}">5</label>
                                                                <input type="radio" id="rating-{{$appointment->id + 4}}" name="rating" value="4" required {{$reviews->where('appointment_id', $appointment->id)->first()?->rating == 4 ? 'checked' : null}} /><label for="rating-{{$appointment->id + 4}}">4</label>
                                                                <input type="radio" id="rating-{{$appointment->id + 3}}" name="rating" value="3" required {{$reviews->where('appointment_id', $appointment->id)->first()?->rating == 3 ? 'checked' : null}} /><label for="rating-{{$appointment->id + 3}}">3</label>
                                                                <input type="radio" id="rating-{{$appointment->id + 2}}" name="rating" value="2" required {{$reviews->where('appointment_id', $appointment->id)->first()?->rating == 2 ? 'checked' : null}} /><label for="rating-{{$appointment->id + 2}}">2</label>
                                                                <input type="radio" id="rating-{{$appointment->id + 1}}" name="rating" value="1" required {{$reviews->where('appointment_id', $appointment->id)->first()?->rating == 1 ? 'checked' : null}} /><label for="rating-{{$appointment->id + 1}}">1</label>
                                                                <input type="radio" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
                                                            </div>
                                                            <x-input-error :messages="$errors->get('rating')" class="text-error mt-2" />

                                                            <label class="mt-2" for="review">Review</label>
                                                            <textarea class="form-control" type="text" id="review" name="review" rows="3" required>{{$reviews->where('appointment_id', $appointment->id)->first()?->review}}</textarea>
                                                            <x-input-error :messages="$errors->get('review')" class="text-error mt-2" />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
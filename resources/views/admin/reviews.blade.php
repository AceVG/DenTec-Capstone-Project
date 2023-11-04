@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
 <!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <h3 class="text-bold mb-4">Review</h6>
            <table class="table table-striped pt-2">
                <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Appointment</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Review</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{$review->user?->name}}</td>
                            <td>{{$review->appointment?->service?->name}} ({{$review->appointment?->start}} - {{$review->appointment?->end}})</td>
                            <td>{{$review->rating}}</td>
                            <td>{{$review->review}}</td>
                            <td>
                                <div class="d-flex align-center gap-2">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$review->id}}">
                                        Delete
                                    </button>
                                    <div class="modal fade" id="delete{{$review->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form class="modal-content" method="POST" action="{{ url('review/delete') }}">
                                                @csrf
                                                
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$review->id}}" />
                                                    
                                                    <p>Are you sure you want to delete review?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Table End -->
@endsection
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
 <!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <h3 class="text-bold mb-4">Services</h6>
            <table class="table table-striped pt-2">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Duration (hours)</th>
                        <th scope="col">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#create" onclick="event.stopPropagation();">
                                Create
                            </button>
                            <div class="modal fade" id="create" tabindex="-1" aria-hidden="true" onclick="event.stopPropagation();">
                                <div class="modal-dialog">
                                    <form class="modal-content" method="POST" action="{{ url('service') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="modal-header">
                                            <h5 class="modal-title">Create</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="name">Name</label>
                                            <input class="form-control" type="text" id="name" name="name" required />
                                            <x-input-error :messages="$errors->get('name')" class="text-error mt-2" />

                                            <label class="mt-2" for="description">Description</label>
                                            <textarea class="form-control" type="text" id="description" name="description" rows="3"></textarea>
                                            <x-input-error :messages="$errors->get('description')" class="text-error mt-2" />

                                            <label class="mt-2" for="duration">Duration (hours)</label>
                                            <input class="form-control" type="number" id="duration" name="duration" required />
                                            <x-input-error :messages="$errors->get('duration')" class="text-error mt-2" />

                                            <div class="mt-3">
                                                <label for="photo" class="form-label">Photo</label>
                                                <input class="form-control" type="file" accept="image/*" name="file" id="photo">
                                                <x-input-error :messages="$errors->get('photo')" class="text-error mt-2" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{$service->name}}</td>
                            <td>{{$service->description}}</td>
                            <td>{{$service->duration}}</td>
                            <td>
                                <div class="d-flex align-center gap-2">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$service->id}}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$service->id}}">
                                        Delete
                                    </button>

                                    <div class="modal fade" id="edit{{$service->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form class="modal-content" method="POST" action="{{ url('service/update') }}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$service->id}}" />

                                                    <label for="name">Name</label>
                                                    <input class="form-control" type="text" id="name" name="name" value="{{$service->name}}" required />
                                                    <x-input-error :messages="$errors->get('name')" class="text-error mt-2" />

                                                    <label class="mt-2" for="description">Description</label>
                                                    <textarea class="form-control" type="text" id="description" name="description" rows="3">{{$service->description}}</textarea>
                                                    <x-input-error :messages="$errors->get('description')" class="text-error mt-2" />

                                                    <label class="mt-2" for="duration">Duration (hours)</label>
                                                    <input class="form-control" type="number" id="duration" name="duration" value="{{$service->duration}}" required />
                                                    <x-input-error :messages="$errors->get('duration')" class="text-error mt-2" />

                                                    <div class="mt-3">
                                                        <label for="photo" class="form-label">Photo</label>
                                                        <input class="form-control" type="file" accept="image/*" name="file" id="photo">
                                                        <x-input-error :messages="$errors->get('photo')" class="text-error mt-2" />
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="delete{{$service->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form class="modal-content" method="POST" action="{{ url('service/delete') }}">
                                                @csrf
                                                
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$service->id}}" />
                                                    
                                                    <p>Are you sure you want to delete service?</p>
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
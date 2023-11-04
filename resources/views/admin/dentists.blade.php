@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
 <!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <h3 class="text-bold mb-4">Dentists</h6>
            <table class="table table-striped pt-2">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#create">
                                Create
                            </button>
                            <div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" method="POST" action="{{ url('dentist') }}">
                                        @csrf

                                        <div class="modal-header">
                                            <h5 class="modal-title">Create</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="name">Name</label>
                                            <input class="form-control" type="text" id="name" name="name" required />
                                            <x-input-error :messages="$errors->get('name')" class="text-error mt-2" />

                                            <label class="mt-2" for="phone">Phone</label>
                                            <input class="form-control" type="text" id="phone" name="phone" />
                                            <x-input-error :messages="$errors->get('phone')" class="text-error mt-2" />

                                            <label class="mt-2" for="email">Email</label>
                                            <input class="form-control" type="email" id="email" name="email" />
                                            <x-input-error :messages="$errors->get('email')" class="text-error mt-2" />
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
                    @foreach ($dentists as $dentist)
                        <tr>
                            <td>{{$dentist->name}}</td>
                            <td>{{$dentist->phone}}</td>
                            <td>{{$dentist->email}}</td>
                            <td>
                                <div class="d-flex align-center gap-2">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$dentist->id}}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$dentist->id}}">
                                        Delete
                                    </button>

                                    <div class="modal fade" id="edit{{$dentist->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form class="modal-content" method="POST" action="{{ url('dentist/update') }}">
                                                @csrf

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$dentist->id}}" />

                                                    <label for="name">Name</label>
                                                    <input class="form-control" type="text" id="name" name="name" value="{{$dentist->name}}" required />
                                                    <x-input-error :messages="$errors->get('name')" class="text-error mt-2" />

                                                    <label class="mt-2" for="phone">Phone</label>
                                                    <input class="form-control" type="text" id="phone" name="phone" value="{{$dentist->phone}}" />
                                                    <x-input-error :messages="$errors->get('phone')" class="text-error mt-2" />

                                                    <label class="mt-2" for="email">Email</label>
                                                    <input class="form-control" type="email" id="email" name="email" value="{{$dentist->email}}" />
                                                    <x-input-error :messages="$errors->get('email')" class="text-error mt-2" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="delete{{$dentist->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form class="modal-content" method="POST" action="{{ url('dentist/delete') }}">
                                                @csrf
                                                
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$dentist->id}}" />
                                                    
                                                    <p>Are you sure you want to delete dentist?</p>
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
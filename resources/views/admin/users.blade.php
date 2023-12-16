@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
 <!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <h3 class="text-bold mb-4">Users</h6>
            <table class="table table-striped pt-2">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Address</th>
                        <th scope="col">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#create" onclick="event.stopPropagation();">
                                Create
                            </button>
                            <div class="modal fade" id="create" tabindex="-1" aria-hidden="true" onclick="event.stopPropagation();">
                                <div class="modal-dialog">
                                    <form class="modal-content" method="POST" action="{{ url('user') }}">
                                        @csrf

                                        <div class="modal-header">
                                            <h5 class="modal-title">Create</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <label for="user_type">User Type</label>
                                            <select id="user_type" name="user_type" class="form-select" required>
                                                <option value="0">Customer</option>
                                                <option value="0">Admin</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('user_type')" class="text-error mt-2" /> -->

                                            <label for="email">Email</label>
                                            <input class="form-control" type="text" id="email" name="email" required />
                                            <x-input-error :messages="$errors->get('email')" class="text-error mt-2" />

                                            <label class="mt-2" for="name">Name</label>
                                            <input class="form-control" type="text" id="name" name="name" required />
                                            <x-input-error :messages="$errors->get('name')" class="text-error mt-2" />

                                            <label class="mt-2" for="phone">Phone</label>
                                            <input class="form-control" type="text" id="phone" name="phone" required />
                                            <x-input-error :messages="$errors->get('phone')" class="text-error mt-2" />

                                            <label class="mt-2" for="birthdate">Birthdate</label>
                                            <input class="form-control" type="date" id="birthdate" name="birthdate" required />
                                            <x-input-error :messages="$errors->get('birthdate')" class="text-error mt-2" />

                                            <label class="mt-2" for="phone">Sex</label>
                                            <div class="form-check">
                                                <input checked class="form-check-input" type="radio" name="sex" id="createSexRadio1" value="true">
                                                <label class="form-check-label" for="createSexRadio1">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sex" id="createSexRadio2" value="false">
                                                <label class="form-check-label" for="createSexRadio2">Female</label>
                                            </div>
                                            <x-input-error :messages="$errors->get('sex')" class="text-error mt-2" />

                                            <label class="mt-2" for="address">Address</label>
                                            <input class="form-control" type="text" id="address" name="address" />
                                            <x-input-error :messages="$errors->get('address')" class="text-error mt-2" />

                                            <label class="mt-2" for="dental_history">Dental History</label>
                                            <textarea class="form-control" type="text" id="dental_history" name="dental_history" rows="3"></textarea>
                                            <x-input-error :messages="$errors->get('dental_history')" class="text-error mt-2" />

                                            <label class="mt-2" for="medical_history">Medical History</label>
                                            <textarea class="form-control" type="text" id="medical_history" name="medical_history" rows="3"></textarea>
                                            <x-input-error :messages="$errors->get('medical_history')" class="text-error mt-2" />

                                            <label class="mt-2" for="remarks">Remarks</label>
                                            <textarea class="form-control" type="text" id="remarks" name="remarks" rows="3"></textarea>
                                            <x-input-error :messages="$errors->get('remarks')" class="text-error mt-2" />

                                            <label class="mt-2" for="password">Password</label>
                                            <input class="form-control" type="password" id="password" name="password" required />
                                            <x-input-error :messages="$errors->get('password')" class="text-error mt-2" />
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
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->birthdate}}</td>
                            <td>{{$user->sex == true ? 'Male' : 'Female'}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                <div class="d-flex align-center gap-2">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$user->id}}">
                                        Edit
                                    </button>

                                    <button type="button" class="btn btn-sm btn-secondary" style="white-space: nowrap" data-bs-toggle="modal" data-bs-target="#edithistory{{$user->id}}">
                                        Edit History
                                    </button>

                                    <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form class="modal-content" method="POST" action="{{ url('user/update') }}">
                                                @csrf

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$user->id}}" />

                                                    <label for="email">Email</label>
                                                    <input class="form-control" type="text" id="email" name="email" value="{{$user->email}}" readonly />
                                                    <x-input-error :messages="$errors->get('email')" class="text-error mt-2" />

                                                    <label class="mt-2" for="name">Name</label>
                                                    <input class="form-control" type="text" id="name" name="name" value="{{$user->name}}" required />
                                                    <x-input-error :messages="$errors->get('name')" class="text-error mt-2" />

                                                    <label class="mt-2" for="phone">Phone</label>
                                                    <input class="form-control" type="text" id="phone" name="phone" value="{{$user->phone}}" required />
                                                    <x-input-error :messages="$errors->get('phone')" class="text-error mt-2" />

                                                    <label class="mt-2" for="birthdate">Birthdate</label>
                                                    <input class="form-control" type="date" id="birthdate" name="birthdate" value="{{date('Y-m-d', strtotime($user->birthdate))}}" required />
                                                    <x-input-error :messages="$errors->get('birthdate')" class="text-error mt-2" />

                                                    <label class="mt-2" for="phone">Sex</label>
                                                    <div class="form-check">
                                                        <input {{$user->sex ? 'checked' : null}} class="form-check-input" type="radio" name="sex" id="createSexRadio1" value="true">
                                                        <label class="form-check-label" for="createSexRadio1">Male</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input {{$user->sex ? null : 'checked'}} class="form-check-input" type="radio" name="sex" id="createSexRadio2" value="false">
                                                        <label class="form-check-label" for="createSexRadio2">Female</label>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('sex')" class="text-error mt-2" />

                                                    <label class="mt-2" for="address">Address</label>
                                                    <input class="form-control" type="text" id="address" name="address" value="{{$user->address}}" />
                                                    <x-input-error :messages="$errors->get('address')" class="text-error mt-2" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="edithistory{{$user->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form class="modal-content" method="POST" action="{{ url('user/update') }}">
                                                @csrf

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit History</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$user->id}}" />

                                                    <label class="mt-2" for="dental_history">Dental History</label>
                                                    <textarea class="form-control" type="text" id="dental_history" name="dental_history" rows="3">{{$user->dental_history}}</textarea>
                                                    <x-input-error :messages="$errors->get('dental_history')" class="text-error mt-2" />

                                                    <label class="mt-2" for="medical_history">Medical History</label>
                                                    <textarea class="form-control" type="text" id="medical_history" name="medical_history" rows="3">{{$user->medical_history}}</textarea>
                                                    <x-input-error :messages="$errors->get('medical_history')" class="text-error mt-2" />

                                                    <label class="mt-2" for="remarks">Remarks</label>
                                                    <textarea class="form-control" type="text" id="remarks" name="remarks" rows="3">{{$user->remarks}}</textarea>
                                                    <x-input-error :messages="$errors->get('remarks')" class="text-error mt-2" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
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
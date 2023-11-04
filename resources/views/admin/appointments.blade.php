@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
 <!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <h3 class="text-bold mb-4">Appointments</h6>
            <table class="table table-striped pt-2">
                <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">User</th>
                        <th scope="col">Service</th>
                        <th scope="col">Dentist</th>
                        <th scope="col">Start</th>
                        <th scope="col">End</th>
                        <th scope="col">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#create">
                                Create
                            </button>
                            <div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" method="POST" action="{{ url('appointment') }}">
                                        @csrf

                                        <div class="modal-header">
                                            <h5 class="modal-title">Create</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="status" value="Approved" />
                                            
                                            <label for="name">User</label>
                                            <select id="user_id" name="user_id" class="form-select" required>
                                                @foreach ($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('user_id')" class="text-error mt-2" />
                                            
                                            <label class="mt-2"  for="service_id">Select Service</label>
                                            <select id="service_id" name="service_id" class="form-select" required>
                                                @foreach ($services as $service)
                                                    <option value="{{$service->id}}">{{$service->name}} - {{$service->duration}} hours</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('service_id')" class="text-error mt-2" />
                                            
                                            <label class="mt-2"  for="dentist_id">Select Dentist</label>
                                            <select id="dentist_id" name="dentist_id" class="form-select" required>
                                                @foreach ($dentists as $dentist)
                                                    <option value="{{$dentist->id}}">{{$dentist->name}}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('dentist_id')" class="text-error mt-2" />

                                            <label class="mt-2" for="start">Date</label>
                                            <input class="form-control" type="datetime-local" id="start" name="start" />
                                            <x-input-error :messages="$errors->get('start')" class="text-error mt-2" />

                                            <label class="mt-2" for="notes">Notes</label>
                                            <textarea class="form-control" type="datetime-local" id="notes" name="notes" rows="3"></textarea>
                                            <x-input-error :messages="$errors->get('notes')" class="text-error mt-2" />
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
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{$appointment->status}}</td>
                            <td>{{$appointment->user?->name}}</td>
                            <td>{{$appointment->service?->name}}</td>
                            <td>{{$appointment->dentist?->name}}</td>
                            <td>{{$appointment->start}}</td>
                            <td>{{$appointment->end}}</td>
                            <td>
                                @if ($appointment->status == 'Pending')
                                <div class="d-flex align-center gap-2">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#approve{{$appointment->id}}">
                                        Approve
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deny{{$appointment->id}}">
                                        Deny
                                    </button>

                                    <div class="modal fade" id="approve{{$appointment->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form class="modal-content" method="POST" action="{{ url('appointment/update') }}">
                                                @csrf

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Approve</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$appointment->id}}" />
                                                    <input type="hidden" name="status" value="Approved" />

                                                    @if (ctype_space($appointment->notes))
                                                    <label for="notes">Notes</label>
                                                    <textarea id="notes" name="notes" type="text" class="form-control mb-2" value="{{$appointment->notes}}" rows="3" readonly></textarea>
                                                    @endif

                                                    <label for="dentist_id">Select Dentist</label>
                                                    <select id="dentist_id" name="dentist_id" class="form-select" value="{{$appointment->dentist_id}}" required>
                                                        @foreach ($dentists as $dentist)
                                                            <option value="{{$dentist->id}}">{{$dentist->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('dentist_id')" class="text-error mt-2" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Approve</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <x-appointment-modal :appointment="$appointment" :status="'Denied'" :statusText="'Deny'" />
                                </div>
                                @elseif ($appointment->status == 'Approved')
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#complete{{$appointment->id}}">
                                        Complete
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#cancel{{$appointment->id}}">
                                        Cancel
                                    </button>
                                    <x-appointment-modal :appointment="$appointment" :status="'Canceled'" :statusText="'Cancel'" />
                                    <x-appointment-modal :appointment="$appointment" :status="'Completed'" :statusText="'Complete'" />
                                @endif
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
@props(['appointment', 'status', 'statusText'])

<div class="modal fade" id="{{strtolower($statusText)}}{{$appointment->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ url('appointment/update') }}">
            @csrf
            
            <div class="modal-header">
                <h5 class="modal-title">Approve</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="{{$appointment->id}}" />

                @if ($statusText == 'View')
                <label class="mt-2" for="status">Status</label>
                <input class="form-control" type="text" id="status" name="status" value="{{$appointment->status}}" readonly />

                <label class="mt-2" for="status">User</label>
                <input class="form-control" type="text" id="status" name="status" value="{{$appointment->user?->name}}" readonly />

                <label class="mt-2" for="service">Service</label>
                <input class="form-control" type="text" id="service" name="service" value="{{$appointment->service?->name}}" readonly />

                <label class="mt-2" for="dentist">Dentist</label>
                <input class="form-control" type="text" id="dentist" name="dentist" value="{{$appointment->dentist?->name}}" readonly />

                <label class="mt-2" for="start">Start</label>
                <input class="form-control" type="text" id="start" name="start" value="{{$appointment->start}}" readonly/>

                <label class="mt-2" for="end">End</label>
                <input class="form-control" type="text" id="end" name="end" value="{{$appointment->end}}" readonly />
                @else
                <input type="hidden" name="dentist_id" value="{{$appointment->dentist_id}}" />
                <input type="hidden" name="status" value="{{$status}}" />
                @endif
                
                @if ($statusText == 'View' || ctype_space($appointment->notes))
                <label class="mt-2" for="notes">Notes</label>
                <textarea id="notes" name="notes" type="text" class="form-control mb-2" rows="3" readonly>{{$appointment->notes}}</textarea>
                @endif

                @if ($statusText == 'View' || $statusText == 'Deny' || $statusText == 'Cancel')
                <label class="mt-2" for="reason">Reason</label>
                <textarea id="reason" name="reason" type="text" class="form-control mb-2" rows="3" {{($statusText == 'View' ? 'readonly' : null)}}>{{$appointment->reason}}</textarea>
                @endif

                @if ($statusText != 'View')
                <p>Are you sure you want to {{strtolower($statusText)}} appointment request?</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                @if ($statusText != 'View')
                <button type="submit" class="btn {{$statusText == 'Deny' || $statusText == 'Cancel' ? 'btn-danger' : 'btn-success'}}">{{$statusText}}</button>
                @endif
            </div>
        </form>
    </div>
</div>

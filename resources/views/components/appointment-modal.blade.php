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
                <input type="hidden" name="dentist_id" value="{{$appointment->dentist_id}}" />
                <input type="hidden" name="status" value="{{$status}}" />
                
                @if (ctype_space($appointment->notes))
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" type="text" class="form-control mb-2" value="{{$appointment->notes}}" rows="3" readonly></textarea>
                @endif

                <p>Are you sure you want to {{strtolower($statusText)}} appointment request?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn {{$statusText == 'Cancel' ? 'btn-danger' : 'btn-success'}}">{{$statusText}}</button>
            </div>
        </form>
    </div>
</div>

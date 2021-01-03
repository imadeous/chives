<div class="modal fade" id="delete-attendance-{{ $attendance->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Attendance Record of {{ $attendance->user->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you wish to delete this Attendance Record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <form method="POST" action="{{ route('attendances.destroy', $attendance) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-primary">Delete</button>
            </div>
        </div>
    </div>
    </form>
</div>

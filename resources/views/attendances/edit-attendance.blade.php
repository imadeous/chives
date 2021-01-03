<div class="modal fade" id="edit-attendance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Attendance Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('attendances.update', $attendance) }}">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" max='{{ date('Y-m-d') }}' name="date" class="form-control"
                            value="{{ date('Y-m-d') }}">
                    </div>
                    <table class="table">
                        <thead>
                            <th>Employee</th>
                            <th>Status</th>
                            <th>Remarks</th>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td>
                                        <span class="d-block">{{ $attendance->user->name }}</span>
                                        <small class="text-muted">
                                            {{ $attendance->user->title }}
                                            {{ $attendance->user->level ? 'Level ' . $attendance->user->level : '' }}
                                        </small>
                                    <input type="hidden" name="user[{{ $attendance->user_id }}][user_id]" value="{{ $attendance->user_id }}">
                                    </td>
                                    <td>
                                        <input type="checkbox" {{$attendance->present ? 'checked' : ''}} name="user[{{ $attendance->user_id }}][present]">
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="user[{{ $attendance->user_id }}][remarks]" value="{{$attendance->remarks}}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                </div>
        </div>
    </div>
    </form>
</div>

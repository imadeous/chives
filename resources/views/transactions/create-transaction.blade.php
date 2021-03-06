<div class="modal fade" id="create-transaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('transactions.store') }}">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" max='{{ date('Y-m-d') }}' name="date" class="form-control"
                            value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Total Amount</label>
                        <input type="text" name="amount" class="form-control" placeholder="Enter Amount in Laaris">
                    </div>
                    <div class="custom-control custom-switch text-center">
                        <input type="checkbox" class="custom-control-input" id="switch1" name="type">
                        <label class="custom-control-label" for="switch1">Income</label>
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Transaction title">
                    </div>
                    <div class="form-group">
                        <label for="">Remarks</label>
                        <textarea name="remarks" rows="5" class="form-control" placeholder="Remarks"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{ Form::open(['method' => 'delete','route' => ['users.destroy', $user->id]]) }}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <h1 class="modal-title" id="myModalLabel">Delete admin</h1>
</div>
<div class="modal-body">
    <div class="modal-col-12">
        <div class="row">
            <div class="col-md-12">
                <p>Are you sure you want to delete <b>{{ $user->username . ' ' . $user->phone }}</b>This action cant done</p>
                <p class="confirm-center">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a href="#" data-dismiss="modal" class="btn btn-link">
                        Cancel
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}







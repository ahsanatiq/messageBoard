@if(session('message'))
    <div class="alert alert-{{ session('status') }} status-box">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        {{ session('message') }}
    </div>
@endif
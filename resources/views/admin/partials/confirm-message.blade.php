@if (session('message'))
    <div class="alert alert-success">
        <button type="button" data-bs-dismiss="alert" aria-label="close" class="btn-close"></button>
        {{ session('message') }}
    </div>
@endif
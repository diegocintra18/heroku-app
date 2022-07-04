
@if(session('error'))
<div class="container mt-3">
    <div class="alert alert-danger">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif


@if(session('mensage'))
<div class="container mt-3">
    <div class="col-12">
        <div class="alert alert-success">
            <strong>{{ session('mensage') }}</strong>
        </div>
    </div>
</div>
@endif
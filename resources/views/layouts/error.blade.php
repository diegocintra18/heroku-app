
@if(session('error'))
    <div class="mt-3">
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
@endif


@if(session('message'))
    <div class="mt-3">
        <div class="alert alert-success">
            <strong>{{ session('message') }}</strong>
        </div>
    </div>
@endif
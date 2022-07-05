
@if(session('error'))
    <div class="container-fluid mt-3">
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
@endif


@if(session('message'))
    <div class="container-fluid mt-3">
        <div class="col-12">
            <div class="alert alert-success">
                <strong>{{ session('message') }}</strong>
            </div>
        </div>
    </div>
@endif
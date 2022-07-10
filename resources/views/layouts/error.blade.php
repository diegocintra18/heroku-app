
@if(session('error'))
    <div class="mt-3">
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('message'))
    <div class="mt-3">
        <div class="alert alert-success">
            <strong>{{ session('message') }}</strong>
        </div>
    </div>
@endif
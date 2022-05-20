@if ($errors->any())
    <div class="offset-sm-3 col-sm-6 mt-5">
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(isset($error))
    <div class="offset-sm-3 col-sm-6 mt-5">
        <p class="alert alert-danger" role="alert">{{ $error }}</p>
    </div>
@endif
@if (session('flash_message'))
    <div class="offset-sm-3 col-sm-6 mt-5">
        <p class="alert alert-success" role="alert">{{ session('flash_message') }}</p>
    </div>
@endif
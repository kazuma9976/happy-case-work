@if (session('flash_message'))
    <div class="offset-sm-3 col-sm-6 mt-5">
        <p class="alert alert-success" role="alert">{{ session('flash_message') }}</p>
    </div>
@endif
@if(isset($flash_message))
    <div class="offset-sm-3 col-sm-6 mt-5">
        <p class="alert alert-success" role="alert">{{ $flash_message }}</p>
    </div>
@endif
@if(isset($flash_message_destroy))
    <div class="offset-sm-3 col-sm-6 mt-5">
        <p class="alert alert-danger" role="alert">{{ $flash_message_destroy }}</p>
    </div>
@endif

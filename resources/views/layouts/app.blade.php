<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <!-- ViewPort Setting -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Original CSS -->
        <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
        <!-- Favicon -->
        <link rel="icon" href="{{  asset('/images/favicon_heart.ico') }}">
        <title>@yield('title')</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="{{ asset('/js/script.js') }}"></script>
    </head>
    <body>
        <div class="container">
            @include('commons.flash_message')
            @include('commons.error_messages')
            @yield('content')
        </div>
    </body>
</html>
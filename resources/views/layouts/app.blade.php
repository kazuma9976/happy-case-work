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
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('/images/favicon_heart.ico') }}">
        <title>@yield('title')</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="{{ asset('/js/script.js') }}"></script>
    </head>
    <body>
        @if(Auth::check())
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand text-primary" href="/top">職員: {{ Auth::user()->name }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="patients_create.php">新規利用者登録</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="log.php">業務日誌</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/logout">ログアウト</a>
                </li>
              </ul>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="利用者検索" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
        @endif
        <div class="container mt-3 p-1">
            @include('commons.flash_message')
            @include('commons.error_messages')
            @yield('content')
        </div>
    </body>
</html>
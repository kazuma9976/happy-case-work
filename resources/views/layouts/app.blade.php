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
        <nav id="menu" class="navbar navbar-expand-sm navbar-light bg-white">
            <!-- 利用者一覧 -->
            <a href="/top" class="navbar-brand text-success">職員: {{ Auth::user()->name }}</a>
            <!-- スマホなどのレスポンスで表示されるハンバーガーボタン -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- メニュー -->
            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav" id="nav">
                    <li class="nav-item">{!! link_to_route('patients.create', '新規利用者登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('logs.index', '業務日誌一覧', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                </ul>
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
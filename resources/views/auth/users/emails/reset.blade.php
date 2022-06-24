@extends('layouts.app')
@section('title', 'パスワード再設定のリクエスト')
@section('content')
    <h1>パスワード再設定のリクエスト</h1>
    <div class="row mt-3">
    　　<p>以下のURLをクリックし、パスワードの再設定を行って下さい。</p>
        <p class="mt-3"><a href="{{ $restUrl }}">{{ $restUrl }}</a></p>
    </div>
@endsection

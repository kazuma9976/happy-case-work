@extends('layouts.app')
@section('title', 'パスワード再設定のリクエスト')
@section('content')
    <div class="text-center">
        <h1>パスワード再設定のリクエスト</h1>
    </div>
    <div class="row mt-3 text-center">
    　　<p>以下をクリックし、パスワードの再設定を行って下さい。</p>
        <p class="mt-3 offset-sm-3 col-sm-6 btn btn-success"><a href="{{ $restUrl }}">{{ $restUrl }}</a></p>
    </div>
@endsection

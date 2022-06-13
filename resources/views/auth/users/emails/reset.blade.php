@extends('layouts.app')
@section('title', 'パスワード再設定のリクエスト')
@section('content')
    <div class="text-center">
        <h1 class="text-info pb-1">パスワード再設定のリクエスト</h1>
    </div>
    <div class="row mt-5 text-center">
    　　<p>以下のボタンをクリックし、パスワードの再設定を行って下さい。</p>
        <p class="mt-3 offset-sm-3 col-sm-6 btn btn-success"><a href="{{ $restUrl }}">パスワードの再設定</a></p>
    </div>
@endsection

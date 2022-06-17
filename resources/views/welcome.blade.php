@extends('layouts.app')
@section('title', '相談記録 精神障害者向け')
@section('content')
    <div class="row">
        <h1 class="col-sm-12 text-center text-primary mb-2">相談支援記録</h1>
        <h2 class="col-sm-12 text-center text-primary mt-2">～ 精神障害者向け ～</h2>
    </div>
    <div class="mt-4" id="mainVisual">
        <img src="{{ ('/images/network1.jpg') }}" alt="最初に表示されるtop画面">
    </div>
    <div class="row mt-5">
        <div class="col-sm-6 offset-sm-3">
            {!! link_to_route('signup.get', '新規職員登録', [], ['class' => 'btn btn-primary btn-block']) !!}
            {!! link_to_route('login', 'ログイン画面', [], ['class' => 'mt-4 btn btn-danger btn-block']) !!}
        </div>
    </div>
@endsection
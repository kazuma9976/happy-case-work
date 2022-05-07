@extends('layouts.app')
@section('title', '相談記録')
@section('content')
            <div class="row">
                <h1 id="title" class="col-sm-12 text-center text-info mt-4 mb-3">相談支援記録</h1>
                <h2 class="col-sm-12 text-center text-info mt-3 mb-2">～ 精神障害者向け ～</h2>
            </div>
            <div id="mainVisual">
                <img src="{{ ('/images/network1.jpg') }}" alt="最初に表示されるtop画面">
            </div>
            <div class="row mt-5">
                <a href="/signup" class="offset-sm-4 col-sm-4 btn btn-primary">新規職員登録</a>
            </div>
            <div class="row mt-3">
                <a href="/login" class="offset-sm-4 col-sm-4 mt-3 btn btn-danger">ログイン</a>
            </div>
@endsection
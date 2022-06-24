@extends('layouts.app')
@section('title', 'パスワード再設定の申請')
@section('content')
    <div class="text-center">
        <h1 class="text-info pb-1">パスワード再設定の申請</h1>
    </div>
    <div class="row mt-5">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'password.email']) !!}
                <!-- 1行 -->
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス :') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('送信', ['class' => 'mt-5 btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            {!! link_to_route('login', 'ログイン画面へ戻る', [], ['class' => 'mt-4 btn btn-danger btn-block']) !!}
        </div>
    </div>
@endsection
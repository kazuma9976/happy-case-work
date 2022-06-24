@extends('layouts.app')
@section('title', '新規職員登録')
@section('content')
    <div class="text-center">
        <h1 class="text-info pb-1">新規職員登録</h1>
    </div>
    <div class="row mt-4">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'signup.post']) !!}
                <!-- 1行 -->
                <div class="form-group">
                    {!! Form::label('name', '名前 :') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <!-- 1行 -->
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス :') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <!-- 1行 -->
                <div class="form-group">
                    {!! Form::label('password', 'パスワード :') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <!-- 1行 -->
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワードの確認 :') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('登録', ['class' => 'mt-5 btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            {!! link_to_route('index', 'トップページへ戻る', [], ['class' => 'mt-4 btn btn-danger btn-block']) !!}
        </div>
    </div>
@endsection
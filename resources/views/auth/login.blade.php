@extends('layouts.app')
@section('title', 'ログイン')
@section('content')
    <div class="text-center mt-3">
        <h1 class="text-info pb-1 mt-3">ログイン画面</h1>
    </div>
    <div class="row mt-4">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login'], []) !!}
                <!-- 1行 -->
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス :') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <!-- 1行 -->
                <div class="form-group mt-4">
                    {!! Form::label('password', 'パスワード : ') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('ログイン', ['class' => 'mt-5 btn btn-primary btn-block']) !!}
                
            {!! Form::close() !!}
            
            @if (Route::has('password.request'))
            {!! link_to_route('password.request', 'パスワードをお忘れの方はこちら', [], ['class' => 'mt-4 btn btn-info btn-block']) !!}
            @endif
                
            {!! link_to_route('index', 'トップページへ戻る', [], ['class' => 'mt-4 btn btn-danger btn-block']) !!}
        </div>

    </div>
    
@endsection



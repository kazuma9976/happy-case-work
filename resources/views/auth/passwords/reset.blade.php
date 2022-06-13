@extends('layouts.app')
@section('title', 'ログイン')
@section('content')
    <div class="text-center mt-3">
        <h1 class="text-info pb-1 mt-3">ログイン画面</h1>
    </div>
    <div class="row mt-4">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'password.update']) !!}
                <!-- 1行 -->
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス :') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <!-- 1行 -->
                <div class="form-group mt-4">
                    {!! Form::label('password', '新しいパスワード : ') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <!-- 1行 -->
                <div class="form-group">
                    {!! Form::label('password_confirmation', '新しいパスワードの確認 :') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                {!! Form::submit('再登録', ['class' => 'mt-5 btn btn-primary btn-block']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection


{{ route('password.update') }}

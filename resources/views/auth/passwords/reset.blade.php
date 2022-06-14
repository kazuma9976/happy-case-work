@extends('layouts.app')
@section('title', 'パスワード再設定の申請フォーム')
@section('content')
    <div class="text-center mt-3">
        <h1 class="text-info pb-1 mt-3">パスワード再設定の申請フォーム</h1>
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
                
                @csrf
                
                {!! Form::submit('再登録', ['class' => 'mt-5 btn btn-primary btn-block']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection


{{ route('password.update') }}

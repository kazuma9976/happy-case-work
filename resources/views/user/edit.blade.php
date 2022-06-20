@extends('layouts.app')
@section('title', '職員:' . $user->name . 'のアカウント編集')
@section('content')
    <div class="text-center text-success mt-5 pt-4">
        <h1>職員: {{ $user->name }}のアカウント編集</h1>
    </div>

    <div class="col-sm-6 offset-sm-3 mt-3 mb-5">
        {!! Form::open(['route' => ['user.update', 'id' => $user->id], 'method' => 'Post']) !!}
            <!-- 1行 -->
            <div class="form-group mt-5">
                {!! Form::label('name', '名前 :') !!}
                {!! Form::text('name', $user->name ? $user->name : old('name'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('email', 'メールアドレス :') !!}
                {!! Form::email('email',  $user->email ? $user->email : old('email'), ['class' => 'form-control']) !!}
            </div>
            
            {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block mt-5']) !!}
        {!! Form::close() !!}
        
    </div>
@endsection
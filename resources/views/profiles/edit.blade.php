@extends('layouts.app')
@section('title', 'プロフィール編集')
@section('content')
    <div class="text-center text-success mt-5 pt-4">
        <h1>職員: {{ Auth::user()->name }}のプロフィール編集</h1>
    </div>

    <div class="col-sm-6 offset-sm-3 mt-3 mb-5">
        {!! Form::open(['route' => ['profiles.update', 'id' => $profile->id], 'files' => true, 'method' => 'PUT']) !!}
            <!-- 1行 -->
            <div class="form-group mt-5">
                {!! Form::label('nickname', 'ニックネーム :') !!}
                {!! Form::text('nickname', $profile->nickname ? $profile->nickname : old('nickname'), ['class' => 'form-control']) !!}
            </div>

            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('gender', '性別 :') !!}
                <div class="form-check form-check-inline offset-2">
                    {{ Form::radio('gender', '男性', $profile->gender === '男性' ? true : false, ['class'=>'form-check-input', 'for' => 'inlineCheckbox1']) }}
                    {!! Form::label('gender', '男性' , ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check form-check-inline offset-2">
                    {{ Form::radio('gender', '女性', $profile->gender === '女性' ? true : false, ['class'=>'form-check-input', 'for' => 'inlineCheckbox2']) }}
                    {!! Form::label('gender', '女性', ['class' => 'form-check-label']) !!}
                </div>
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('department', '所属部署 :') !!}
                {!! Form::text('department',  $profile->department ? $profile->department : old('department'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('introduction', '自己紹介 :') !!}
                {!! Form::textarea('introduction',  $profile->introduction ? $profile->introduction : old('introduction'), ['class' => 'form-control', 'rows' => '4']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('image', 'アバターアイコン : ') !!}<br>
                {!! Form::file('image') !!}
            </div>
            {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block mt-5']) !!}
        {!! Form::close() !!}
    </div>
@endsection
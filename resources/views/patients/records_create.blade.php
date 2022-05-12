@extends('layouts.app')
@section('title', '新規相談記録登録')
@section('content')         
    <div class="row mt-3">
        <h1 class="col-sm-12 text-center text-success pb-1 mt-5">新規相談記録登録</h1>
    </div>
    <div class="col-sm-6 offset-sm-3 mt-3">
        {!! Form::open(['route' => ['records.store', 'id' => $patient->id], 'files' => true]) !!}
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('recording_date', '日付 : ') !!}
                {{ Form::date('recording_date', old('recording_date'), ['class' => 'form-control']) }}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('content', '内容 :') !!}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('image', '画像資料 :') !!}
                {!! Form::file('image', ['class' => 'form-control']) !!}
            </div>
            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
            
            {!! Form::submit('登録', ['class' => 'offset-sm-4 col-sm-4 mt-5 mb-5 btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection
            
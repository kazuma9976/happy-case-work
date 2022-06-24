@extends('layouts.app')
@section('title', '新規業務日誌登録')
@section('content')         
    <div class="row mt-3">
        <h1 class="col-sm-12 text-center text-success pb-1 mt-5">新規業務日誌登録</h1>
    </div>
    <div class="col-sm-6 offset-sm-3 mt-3 mb-5">
        {!! Form::open(['route' => ['logs.store'], 'files' => true]) !!}
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('date', '日付 : ') !!}
                {{ Form::date('date', old('date'), ['class' => 'form-control']) }}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('weather', '天気 :') !!}
                {{ Form::select('weather', ['晴れ' => '晴れ', '曇り' => '曇り', '雨' => '雨', '雪' => '雪'], old('weather'), ['class' => 'form-control', 'placeholder'=>'選択してください']) }}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('staff', '職員 :') !!}
                {!! Form::text('staff', old('staff'), ['class' => 'form-control', 'placeholder' => '例: 佐藤、上田、小田(有休)。']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('notice', '利用者の特記事項 :') !!}
                {!! Form::textarea('notice', old('notice'), ['class' => 'form-control', 'placeholder' => '例: 利用者X・・・本日、不穏状態が悪化しA病院へ入院。', 'rows' => '5']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('phone_record', '電話記録 :') !!}
                {!! Form::textarea('phone_record', old('phone_record'), ['class' => 'form-control', 'placeholder' => '例: B相談支援事業所の田中・・・利用者Yの近況に関する連絡。', 'rows' => '5']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('mail_record', 'メール記録 :') !!}
                {!! Form::textarea('mail_record', old('mail_record'), ['class' => 'form-control', 'placeholder' => '例: C病院の鈴木Ns.・・・利用者Zの担当者会議の調整に関する連絡', 'rows' => '5']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('meeting', '会議 :') !!}
                {!! Form::textarea('meeting', old('meeting'), ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('business_trip', '出張 :') !!}
                {!! Form::textarea('business_trip', old('business_trip'), ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('training', '研修 :') !!}
                {!! Form::textarea('training', old('training'), ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group">
                {!! Form::label('image', '画像資料 : ') !!}<br>
                {!! Form::file('image', ['id' => 'preview-uploader', 'class' => 'form-control']) !!}
                
                <!-- 画像プレビュー -->
                <div id="preview" class="mt-3"></div>
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('other', 'その他 :') !!}
                {!! Form::textarea('other', old('other'), ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
            
            {!! Form::submit('登録', ['class' => 'offset-sm-2 col-sm-8 mt-5 btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection
            
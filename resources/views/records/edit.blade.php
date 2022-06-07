@extends('layouts.app')
@section('title', $patient->name . 'の記録番号:' . $index . 'の編集')
@section('content')         
    <div class="row mt-3">
        <h1 class="col-sm-12 text-center text-success pb-1 mt-5">{{ $patient->name }}の記録番号: {{ $index }}の編集</h1>
    </div>
    <div class="col-sm-6 offset-sm-3 mt-3 mb-5">
        {!! Form::open(['route' => ['records.update', $patient->id, $record->id, 'index' => $index], 'files' => true, 'method' => 'PUT']) !!}
        <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('content', '記録内容 :') !!}
                {!! Form::textarea('content', $record->content ? $record->content : old('content'), ['class' => 'form-control' , 'rows' => '5']) !!}
            </div>
            
            <!--その相談記録に画像資料が登録されているならば画像資料を表示させる-->
            @if($record->image)
            <p class="text-primary mt-4">※現在登録されている画像資料</p>
            <img src="{{ Storage::disk('s3')->url('uploads/' . $record->image) }}" alt="{{ $record->image }}" class="now_image">
            <!--そうでなければno_image画像を表示させる。 -->
            @else
            <p class="text-danger mt-4">※現在画像資料は登録されていません</p>
            <img src="{{ asset('images/no_image.jpg') }}" alt="画像は未設定です。" class="now_image">
            @endif
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('image', '画像資料 : ') !!}<br>
                {!! Form::file('image', ['id' => 'preview-uploader', 'class' => 'form-control']) !!}
                
                <!-- 画像プレビュー -->
                <div id="preview" class="mt-3"></div>
            </div>
            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
            
            {!! Form::submit('更新', ['class' => 'offset-sm-2 col-sm-8 mt-5 btn btn-primary']) !!}
        {!! Form::close() !!}
        
        {!! link_to_route('records.show', $patient->name . 'の記録番号: ' . $index . ' の詳細へ戻る', [$patient->id, $record->id, 'index' => $index], ['class' => 'offset-sm-2 col-sm-8 mt-4 btn btn-danger']) !!}
    </div>
@endsection
            
@extends('layouts.app')
@section('title', $patient->name . 'の記録番号:' . $index . ' の詳細')
@section('content')           
    <div class="row mt-5">
        <h1 id="title" class="col-sm-12 text-center text-success mt-4 mb-3">{{ $patient->name }}の記録番号: {{ $index }} の詳細</h1>
    </div>
    <table class="table table-bordered table-striped mt-4">
        <tr>
            <th class="text-center">記録した職員</th>
            <td>{{ $record->user->name }}</td>
        </tr>
        <tr>
            <th class="text-center">記録内容</th>
            <td>{{ $record->content }}</td>
        </tr>
        <tr class="text-center">
            <th>画像資料</th>
            <td>
                @if($record->image)
                <img src="/uploads/{{ $record->image }}" alt="{{ $record->image }}" id="case_detail_photo">
                @else
                <img src="{{ asset('images/no_image.jpg') }}" alt="画像資料はありません" id="case_detail_photo">
                @endif
            </td>
        </tr>
        <tr>
            <th class="text-center">記録日時</th>
            <td class="text-primary">{{ $record->created_at }}</td>
        </tr>
        <tr>
            <th class="text-center">更新日時</th>
            <td class="text-danger">{{ $record->updated_at }}</td>
        </tr>
    </table>
    
    @if($record->user->id === Auth::id())
    <div class="row mt-5">
        {!! link_to_route('records.edit', '編集', [$patient->id, $record->id, 'index' => $index], ['class' => 'offset-sm-4 col-sm-4 btn btn-success']) !!}
    </div>
    
    
    {!! Form::model($record, ['route' => ['records.destroy', $patient->id, $record->id, 'index' => $index], 'method' => 'DELETE']) !!}
    <div class="row mt-4">
        <!-- 削除確認アラートをつける。 -->
        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-block offset-sm-4 col-sm-4', 'id' => 'delete_record']) !!}
    </div>
    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
    {!! Form::close() !!}
    @endif
    
    <div class="row mt-5 mb-5">
        {!! link_to_route('records.index', $patient->name . 'の相談記録一覧へ戻る', ['id' => $patient->id], ['class' => 'offset-sm-4 col-sm-4 btn btn-info']) !!}
    </div>
@endsection
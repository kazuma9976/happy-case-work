@extends('layouts.app')
@section('title', $patient->name . 'の記録番号:' . $record->id . 'の詳細')
@section('content')           
    <div class="row mt-5">
        <h1 id="title" class="col-sm-12 text-center text-success mt-4 mb-3">{{ $patient->name }}の記録番号: {{ $record->id }}の詳細</h1>
    </div>
    <table class="table table-bordered table-striped text-center mt-4">
        <tr>
            <th>記録番号</th>
            <th>内容</th>
            <th>画像資料</th>
            <th>記録した職員</th>
            <th>記録日時</th>
        </tr>
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->content }}</td>
            <td><img src="/uploads/{{ $record->image }}" alt="画像はありません" id="case_photo"></td>
            <td>{{ $record->user->name }}</td>
            <td class="text-primary">{{ $record->created_at }}</td>
        </tr>
        
    </table>
    
    <div class="row mt-5">
        {!! link_to_route('records.edit', '編集', [$patient->id, $record->id], ['class' => 'offset-sm-4 col-sm-4 btn btn-success']) !!}
    </div>
    
    <div class="row mt-4">
        {!! link_to_route('records.index', $patient->name . 'の相談記録一覧へ戻る', ['id' => $patient->id], ['class' => 'offset-sm-4 col-sm-4 btn btn-info']) !!}
    </div>
    
    {!! Form::model($record, ['route' => ['records.destroy', $patient->id, $record->id], 'method' => 'DELETE']) !!}
    <div class="row mt-4 mb-5">
        <!-- 削除確認アラートをつける。 -->
        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-block offset-sm-4 col-sm-4', 'id' => 'delete_record']) !!}
    </div>
    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
    {!! Form::close() !!}
        
@endsection
@extends('layouts.app')
@section('title', '利用者ID: ' . $patient->name . 'の相談記録一覧')
@section('content')
    <div class="row mt-3">
        <h1 id="title" class="col-sm-12 text-center text-success mt-5 mb-3">{{ $patient->name }} の相談記録一覧</h1>
    </div>
    <div class="row mt-3">
        {!! link_to_route('records.create', '新規ケース記録記入', ['id' => $patient->id ],['class' => 'offset-sm-4 col-sm-4 mt-4 btn btn-primary']) !!}
        {!! link_to_route('patients.show', $patient->name . 'の登録情報の詳細', ['id' => $patient->id ],['class' => 'offset-sm-4 col-sm-4 mt-4 btn btn-info']) !!}
    </div>
    <p class="text-danger mt-5">※現在の相談記録 : {{ count($records) }}件</p>
    <table class="table table-bordered table-striped text-center">
            <tr>
                <th>記録番号</th>
                <th>内容</th>
                <th>画像資料</th>
                <th>記録した職員</th>
                <th>記録日時</th>
            </tr>
        @foreach($records as $record)
            <tr>
                <td>{!! link_to_route('records.show', $record->id, [$patient->id, $record->id], ['class' => 'btn btn-success']) !!}</td>
                <td>{{ $record->content }}</td>
                <td><img src="/uploads/{{ $record->image }}" alt="画像はありません" id="case_photo"></td>
                <td>{{ $record->user->name }}</td>
                <td class="text-primary">{{ $record->created_at }}</td>
            </tr>
        @endforeach
    </table>
@endsection           
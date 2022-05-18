@extends('layouts.app')
@section('title', '記録番号: ' . $log->id . 'の業務日誌詳細')
@section('content')
    <div class="row mt-5">
        <h1 id="title" class="col-sm-12 text-center text-success mt-4 mb-3">記録番号: {{ $log->id }}の業務日誌詳細</h1>
    </div>
    <p class="text-primary mt-4">※登録日時 : {{ $log->created_at }}</p>
    <table class="table table-bordered table-striped text-center mt-3">
        <tr>
            <th>記録番号</th>
            <td>{{ $log->id }}</td>
        </tr>
        <tr>
            <th>日付</th>
            <td>{{ $log->date }}</td>
        </tr>
        <tr>
            <th>天気</th>
            <td>{{ $log->weather }}</td>
        </tr>
        <tr>
            <th>職員</th>
            <td>{{ $log->staff }}</td>
        </tr>
        <tr>
            <th>特記事項</th>
            <td>{{ $log->notice }}</td>
        </tr>
        <tr>
            <th>会議</th>
            <td>{{ $log->meeting }}</td>
        </tr>
        <tr>
            <th>出張・研修</th>
            <td>{{ $log->business_trip }}</td>
        </tr>
        <tr>
            <th>画像資料</th>
            <td>{{ $log->image }}</td>
        </tr>
        <tr>
            <th>その他</th>
            <td>{{ $log->other }}</td>
        </tr>
    </table>
    
    <div class="row mt-5">
        {!! link_to_route('logs.edit', '編集', ['id' => $log->id ], ['class' => 'offset-sm-4 col-sm-4 btn btn-success']) !!}
    </div>
    
    {!! Form::model($log, ['route' => ['logs.destroy', 'id' => $log->id ], 'method' => 'DELETE']) !!}
    <div class="row mt-4 mb-5">
        <!-- 削除確認アラートをつける。 -->
        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-block offset-sm-4 col-sm-4', 'id' => 'delete_log']) !!}
    </div>
    {!! Form::close() !!}
    
@endsection 
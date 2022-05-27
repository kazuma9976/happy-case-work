@extends('layouts.app')
@section('title', '業務日誌一覧')
@section('content')
    <div class="row mt-5">
        <h1 class="col-sm-12 text-center text-success mt-4 mb-3">業務日誌一覧</h1>
    </div>
    
    {!! link_to_route('logs.create', '新規業務日誌作成', [],['class' => 'offset-sm-4 col-sm-4 mt-4 btn btn-primary']) !!}
    
    <div class="row mt-5">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => ['logs.search'], 'method' => 'get']) !!}
                <div class="form-group">
                    {!! Form::label('keyword', '業務日誌検索:', ['class' => 'text-primary']) !!}
                    {!! Form::search('keyword', $keyword, ['class' => 'form-control', 'placeholder' => '記録番号(半角数字)、職員で検索可能']) !!}
                </div>
                {!! Form::submit('検索', ['class' => 'btn btn-secondary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
    @if($logs->total() !== 0)
    <div class="row mt-4">
        <p class="col-sm-12 text-left text-danger mt-2">※業務日誌: {{ $logs->total() }}件</p>
    </div>
    <table class="table table-bordered table-striped text-center">
        <tr>
            <th>記録番号</th>
            <th>日付</th>
            <th>業務日誌の作成者</th>
            <th>登録日時</th>
        </tr>
        @foreach($logs as $log)
        <tr>
            <td>{!! link_to_route('logs.show', $log->id, ['id' => $log->id ], ['class' => 'btn btn-success']) !!}</td>
            <td>{{ $log->date }}</td>
            <td>{!! link_to_route('users.show', $log->user->name, ['id' => $log->user->id], ['class' => 'text-info']) !!}</td>
            <td class="text-primary">{{ $log->created_at }}</td>
        </tr>
        @endforeach
    </table>
    {{ $logs->links('pagination::bootstrap-4') }}
    
    @else
        <h2 class="mt-5 text-center text-danger">※業務日誌はありません</h2>
    @endif
    
@endsection
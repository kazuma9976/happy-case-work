@extends('layouts.app')
@section('title', '業務日誌一覧')
@section('content')
    <div class="row mt-5">
        <h1 id="title" class="col-sm-12 text-center text-success mt-4 mb-3">業務日誌一覧</h1>
    </div>
    
    {!! link_to_route('logs.create', '新規業務日誌作成', [],['class' => 'offset-sm-4 col-sm-4 mt-4 btn btn-primary']) !!}
    {!! link_to_route('patients.index', '利用者一覧へ戻る', [],['class' => 'offset-sm-4 col-sm-4 mt-4 btn btn-info']) !!}
    
    @if(count($logs) !== 0)
    <div class="row mt-4">
        <p class="col-sm-12 text-left text-danger mt-2">※業務日誌: {{ $logs->total() }}件</p>
    </div>
    <table class="table table-bordered table-striped text-center">
        <tr>
            <th>記録番号</th>
            <th>日付</th>
        </tr>
        @foreach($logs as $log)
        <tr>
            <td>{!! link_to_route('logs.show', $log->id, ['id' => $log->id ], ['class' => 'btn btn-success']) !!}</td>
            <td>{{ $log->date }}</td>
        </tr>
        @endforeach
    </table>
    {{ $logs->links('pagination::bootstrap-4') }}
    
    @else
        <h2 class="mt-3 text-center text-danger">※業務日誌はありません</h2>
    @endif
    
@endsection
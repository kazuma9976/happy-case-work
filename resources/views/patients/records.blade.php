@extends('layouts.app')
@section('title', '利用者ID: ' . $patient->name . 'の相談記録一覧')
@section('content')
    <div class="row mt-3">
        <h1 id="title" class="col-sm-12 text-center text-success mt-5 mb-3">{{ $patient->name }} の相談記録一覧</h1>
    </div>
    <div class="row mt-3">
        {!! link_to_route('records.create', '新規相談記録記入', ['id' => $patient->id ],['class' => 'offset-sm-4 col-sm-4 mt-4 btn btn-primary']) !!}
        {!! link_to_route('patients.show', $patient->name . 'の登録情報の詳細', ['id' => $patient->id ],['class' => 'offset-sm-4 col-sm-4 mt-4 btn btn-info']) !!}
        {!! link_to_route('patients.index', '利用者一覧へ戻る', [],['class' => 'offset-sm-4 col-sm-4 mt-4 btn btn-danger']) !!}
    </div>
    
    <!-- 相談記録のキーワード検索 -->
    <div class="row mt-5">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => ['records.search', $patient->id], 'method' => 'get']) !!}
                <div class="form-group">
                    {!! Form::label('keyword', '相談記録検索: ', ['class' => 'text-primary']) !!}
                    {!! Form::search('keyword', $keyword, ['class' => 'form-control', 'placeholder' => '記録内容で検索可能']) !!}
                </div>
                {!! Form::submit('検索', ['class' => 'btn btn-secondary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    @if($records->total() !== 0)
    <p class="text-danger mt-4">※相談記録 : {{ $records->total() }}件</p>
    <table class="table table-bordered table-striped text-center">
            <tr>
                <th>記録番号</th>
                <th>記録内容</th>
                <th>画像資料</th>
                <th>記録日時</th>
            </tr>
        <!-- 各利用者の記録番号をそれぞれ1から表示されるようにするため連想配列を用いて加工 -->
        @foreach($records as $key => $record)
            <tr>
                <td>{!! link_to_route('records.show', ($key + 1), [$patient->id, $record->id], ['class' => 'btn btn-success']) !!}</td>
                <td>{{ $record->content }}</td>
                <td>
                    @if($record->image)
                    <img src="/uploads/{{ $record->image }}" alt="{{ $record->image }}" id="case_photo">
                    @else
                    <img src="{{ asset('images/no_image.jpg') }}" alt="画像資料はありません" id="case_photo">
                    @endif
                </td>
                <td class="text-primary">{{ $record->created_at }}</td>
            </tr>
        @endforeach
    </table>
    {{ $records->links('pagination::bootstrap-4') }}
    
    @else
        <h2 class="mt-5 text-center text-danger">※相談記録はありません</h2>
    @endif
@endsection           
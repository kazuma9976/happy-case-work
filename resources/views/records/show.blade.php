@extends('layouts.app')
@section('title', $patient->name . 'の記録番号:' . $index . ' の相談記録詳細')
@section('content')           
    <div class="row mt-5">
        <h1 class="col-sm-12 text-center text-success mt-4 mb-3">{{ $patient->name }}の記録番号: {{ $index }} の相談記録詳細</h1>
    </div>
    <table class="table table-bordered table-striped mt-4">
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
            <th class="text-center">記録した職員</th>
            <td>{{ $record->user->name }}</td>
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
    
    <div class="row mt-5">
        {!! link_to_route('records.index', $patient->name . 'の相談記録一覧へ戻る', ['id' => $patient->id], ['class' => 'offset-sm-4 col-sm-4 btn btn-info']) !!}
    </div>
    
    <!-- この相談記録に対するコメント -->
    <div class="text-center text-primary mt-5">
        <h2>コメント一覧</h2>
    </div>
    <div class="row mt-3">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => ['comments.store', 'id' => $record->id, $patient->id]]) !!}
                <div class="form-group">
                    {!! Form::label('content', 'コメント: ', ['class' => 'text-primary']) !!}
                    {!! Form::text('content', old('content'), ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @if(count($comments) !== 0)
    <table class="table table-bordered table-striped mt-5">
        <tr class="text-center">
            <th>コメントした職員</th>
            <th>コメント内容</th>
            <th>投稿日時</th>
        </tr>
        @foreach($comments as $comment)
        <tr>
            <td class="text-center">{{ $comment->user->name }}</td>
            <td>{{ $comment->content }}</td>
            <td class="text-center">{{ $comment->created_at }}</td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="row mt-5 mb-5">
        <div class="col-sm-12 text-center text-danger">
            ※コメントはまだありません。
        </div>
    </div>
    @endif
    
@endsection
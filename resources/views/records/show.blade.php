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
            <td>{!! link_to_route('users.show', $record->user->name, ['id' => $record->user->id], ['class' => 'text-info']) !!}</td>
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

            {!! Form::open(['route' => ['comment.store', 'patient_id' => $patient->id, 'record_id' => $record->id]]) !!}
                <div class="form-group">
                    {!! Form::label('content', 'コメント内容: ') !!}
                    {!! Form::text('content', old('content'), ['class' => 'form-control']) !!}
                    {!! Form::label('open_flag', 'コメントの公開範囲 :', ['class' => 'mt-4']) !!}
                    {{ Form::select('open_flag', ['自分のみ閲覧' => '自分のみ閲覧', '全体に公開' => '全体に公開'], old('open_flag'), ['class' => 'form-control', 'placeholder'=>'コメントの公開範囲を選択してください']) }}
                </div>
                {!! Form::submit('コメントの投稿', ['class' => 'btn btn-primary btn-block mt-5']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @if(count($comments) !== 0)
    <table class="table table-bordered table-striped mt-5">
        <tr class="text-center">
            <th>ID</th>
            <th>職員</th>
            <th>コメント内容</th>
            <th>コメントの公開範囲</th>
            <th>投稿日時</th>
        </tr>
        <!-- 相談記録に対するコメントの番号をそれぞれ1から表示されるようにするため連想配列を用いて加工 -->
        @foreach($comments as $comment)
        <!--そのコメントがログインしている職員のもので、または全体に公開設定されているコメントならば-->
        @if($comment->user->id === Auth::id() || $comment->open_flag === '全体に公開')
        <tr>
            <td class="text-center">{{ $comment->id }}</td>
            <td class="text-center">{!! link_to_route('users.show', $comment->user->name, ['id' => $comment->user->id], ['class' => 'text-info']) !!}</td>
            <td>{{ $comment->content }}</td>
            <td class="text-center">{{ $comment->open_flag  }}</td>
            <td class="text-center text-primary">{{ $comment->created_at }}</td>
        </tr>
        @endif
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
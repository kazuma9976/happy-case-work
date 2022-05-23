@extends('layouts.app')
@section('title', '記録番号: ' . $log->id . ' の業務日誌の詳細')
@section('content')
    <div class="row mt-5">
        <h1 id="title" class="col-sm-12 text-center text-success mt-4 mb-3">記録番号: {{ $log->id }} の業務日誌の詳細</h1>
    </div>
    <table class="table table-bordered table-striped mt-4">
        <tr>
            <th class="text-center">日付</th>
            <td>{{ $log->date }}</td>
        </tr>
        <tr>
            <th class="text-center">天気</th>
            <td>{{ $log->weather }}</td>
        </tr>
        <tr>
            <th class="text-center">出勤した職員</th>
            <td>{{ $log->staff }}</td>
        </tr>
        <tr>
            <th class="text-center">特記事項</th>
            <td>{{ $log->notice }}</td>
        </tr>
        <tr>
            <th class="text-center">電話記録</th>
            <td>{{ $log->phone_record }}</td>
        </tr>
        <tr>
            <th class="text-center">メール記録</th>
            <td>{{ $log->mail_record }}</td>
        </tr>
        <tr>
            <th class="text-center">会議</th>
            <td>{{ $log->meeting }}</td>
        </tr>
        <tr>
            <th class="text-center">出張</th>
            <td>{{ $log->business_trip }}</td>
        </tr>
        <tr>
            <th class="text-center">研修</th>
            <td>{{ $log->training }}</td>
        </tr>
        <tr>
            <th class="text-center">画像資料</th>
            <td class="text-center">
                @if($log->image)
                <img src="/uploads/{{ $log->image }}" alt="画像はありません" id="log_photo">
                @else
                <img src="{{ asset('images/no_image.jpg') }}" alt="画像資料はありません" id="log_photo">
                @endif
            </td>
        </tr>
        <tr>
            <th class="text-center">その他</th>
            <td>{{ $log->other }}</td>
        </tr>
        <tr>
            <th class="text-center">登録日時</th>
            <td class="text-primary">{{ $log->created_at }}</td>
        </tr>
        <tr>
            <th class="text-center">更新日時</th>
            <td class="text-danger">{{ $log->updated_at }}</td>
        </tr>
    </table>
    
    <!-- 業務日誌 すべての登録職員がその都度、編集、削除ができるようにする -->
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
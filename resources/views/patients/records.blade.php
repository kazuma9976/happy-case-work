@extends('layouts.app')
@section('title', '利用者ID: ' . $patient->id . 'の相談記録')
@section('content')
    <div class="row mt-2">
        <h1 id="title" class="col-sm-12 text-center text-success mt-5 mb-3">{{ $patient->name }} さんの相談記録一覧</h1>
    </div>
    <div class="row mt-3">
        <a href="/patients/{{ $patient->id }}/records/create" class="offset-sm-4 col-sm-4 btn btn-primary">新規ケース記録記入</a>
        <a href="patients_show.php" class="offset-sm-4 col-sm-4 btn btn-success mt-4">登録情報の詳細</a>
    </div>
    <table class="table table-bordered table-striped text-center mt-5">
        @foreach($records as $record)
            <tr>
                <th><a href="case_show.php">{{ $record->recording_date }} 職員: {{ $record->user->name }}</a></th>
                <th>画像資料</th>
            </tr>
            <tr>
                <td>{{ $record->content }}</td>
                <td><img src="images/{{ $record->image }}" alt="画像はありません" id="case_photo"></td>
            </tr>
        @endforeach
    </table>
@endsection           
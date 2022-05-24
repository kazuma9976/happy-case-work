@extends('layouts.app')
@section('title', '職員: ' . $user->name . 'のプロフィール')
@section('content')
    <div class="text-center text-success mt-5 pt-4">
        <h1>職員: {{ $user->name }} のプロフィール</h1>
    </div>
    @if($profile)
    <table class="table table-bordered table-striped mt-5">
        <tr class="text-center">
            <th>プロフィール画像</th>
            <td>
                @if($profile->image)
                <img src="{{ asset('uploads')}}/{{ $profile->image }}" alt="no image" id="image_icon">
                @else
                <img src="{{ asset('images/no_image_human.jpg') }}" alt="画像資料はありません" id="image_icon">
                @endif
            </td>
        </tr>
        <tr class="text-center">
            <th>ニックネーム</th>
            <td class="text-center">{{ $profile->nickname }}</td>
        </tr>
        <tr class="text-center">
            <th>性別</th>
            <td class="text-center">{{ $profile->gender }}</td>
        </tr>
        <tr class="text-center">
            <th>所属部署</th>
            <td class="text-center">{{ $profile->department }}</td>
        </tr>
        <tr class="text-center">
            <th>自己紹介</th>
            <td>{{ $profile->introduction }}</td>
        </tr>
    </table>
    @else
    <div class="row mt-5">
        <p class="col-sm-12 text-center text-danger">※プロフィールは未設定です</p>
    </div>
    @endif
    
    <!-- 注目する職員が記録した相談記録一覧 -->
    <div class="row mt-3">
        <h2 class="col-sm-12 text-center text-primary mt-5 mb-3">記録した相談記録一覧</h2>
    </div>
    @if($records->total() !== 0)
    <p class="text-danger mt-4">※相談記録 : {{ $records->total() }}件</p>
    <table class="table table-bordered table-striped text-center mt-3">
        <tr>
            <th>記録番号</th>
            <th>記録内容</th>
            <th>画像資料</th>
            <th>記録日時</th>
        </tr>
        <!-- 各利用者の記録番号をそれぞれ1から表示されるようにするため連想配列を用いて加工 -->
        @foreach($records as $key => $record)
            <tr>
                <td>{!! link_to_route('records.show', ($key + 1), [$record->patient_id, $record->id], ['class' => 'btn btn-success']) !!}</td>
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
    <div class="row mt-5">
        <p class="col-sm-12 text-center text-danger">※{{ $user->name }} さんが記録した相談記録はまだありません</p>
    </div>
    @endif
    
    <!-- 注目する職員が記録した業務日誌一覧 -->
    <div class="row mt-3">
        <h3 class="col-sm-12 text-center text-primary mt-5 mb-3">記録した業務日誌一覧</h3>
    </div>
    @if($logs->total() !== 0)
    <p class="text-danger mt-4">※業務日誌 : {{ $logs->total() }}件</p>
    <table class="table table-bordered table-striped text-center mt-3">
        <tr>
            <th>記録番号</th>
            <th>日付</th>
            <th>出勤した職員</th>
        </tr>
        @foreach($logs as $log)
            <tr>
                <td>{!! link_to_route('logs.show', $log->id, [$log->id], ['class' => 'btn btn-success']) !!}</td>
                <td>{{ $log->date }}</td>
                <td>{{ $log->staff }}</td>
            </tr>
        @endforeach
    </table>
    {{ $logs->links('pagination::bootstrap-4') }}
    @else
    <div class="row mt-5">
        <p class="col-sm-12 text-center text-danger">※{{ $user->name }} さんが記録した業務日誌はまだありません</p>
    </div>
    @endif
    
@endsection
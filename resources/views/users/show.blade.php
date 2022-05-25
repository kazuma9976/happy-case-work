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
                <img src="{{ asset('uploads')}}/{{ $profile->image }}" alt="no_image" id="image_icon">
                @else
                <img src="{{ asset('images/no_image_human.jpg') }}" alt="画像資料はありません" id="image_icon">
                @endif
            </td>
        </tr>
        <tr>
            <th class="text-center">ニックネーム</th>
            <td>{{ $profile->nickname }}</td>
        </tr>
        <tr>
            <th class="text-center">性別</th>
            <td>{{ $profile->gender }}</td>
        </tr>
        <tr>
            <th class="text-center">所属部署</th>
            <td>{{ $profile->department }}</td>
        </tr>
        <tr>
            <th class="text-center">自己紹介</th>
            <td>{{ $profile->introduction }}</td>
        </tr>
        <tr>
            <th class="text-center">ブックマークした相談記録一覧</th>
            <td>{!! link_to_route('users.record_bookmarks', 'ブックマーク一覧', ['id' => $user->id ], ['class' => 'nav-link']) !!}</td>
        </tr>
    </table>
    @else
    <div class="row mt-5">
        <p class="col-sm-12 text-center text-danger">※プロフィールは未設定です</p>
    </div>
    @endif
    
    <!-- 注目する職員が登録した利用者一覧 -->
    <div class="row mt-3">
        <h2 class="col-sm-12 text-center text-primary mt-5 mb-3">登録した利用者一覧</h2>
    </div>
    @if($patients->total() !== 0)
    <p class="text-danger mt-4">※利用者 : {{ $patients->total() }}人</p>
    <table class="table table-bordered table-striped text-center">
        <tr>
            <th>ID</th>
            <th>利用者名</th>
            <th>生年月日</th>
            <th>性別</th>
            <th>病名</th>
            <th>相談記録の件数</th>
        </tr>
        @foreach($patients as $patient)
            <tr>
                <td>{!! link_to_route('records.index', $patient->id, ['id' => $patient->id ], ['class' => 'btn btn-success']) !!}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->birthday }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->disease_name }}</td>
                <td>{{ $patient->records()->count() }} 件</td>
            </tr>
        @endforeach
    </table>
    {{ $patients->links('pagination::bootstrap-4') }}
    @else
    <div class="row mt-3">
        <p class="col-sm-12 text-center text-danger">※職員: {{ $user->name }} が登録した利用者はまだいません</p>
    </div>
    @endif
    
    <!-- 注目する職員が記録した相談記録一覧 -->
    <div class="row mt-3">
        <h3 class="col-sm-12 text-center text-primary mt-5 mb-3">記録した相談記録一覧</h3>
    </div>
    @if($records->total() !== 0)
    <p class="text-danger">※相談記録 : {{ $records->total() }}件</p>
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
    <div class="row mt-3">
        <p class="col-sm-12 text-center text-danger">※職員: {{ $user->name }} が記録した相談記録はまだありません</p>
    </div>
    @endif
    
    <!-- 注目する職員が記録した業務日誌一覧 -->
    <div class="row mt-3">
        <h4 class="col-sm-12 text-center text-primary mt-5 mb-3">記録した業務日誌一覧</h4>
    </div>
    @if($logs->total() !== 0)
    <p class="text-danger">※業務日誌 : {{ $logs->total() }}件</p>
    <table class="table table-bordered table-striped text-center mt-3">
        <tr>
            <th>記録番号</th>
            <th>日付</th>
            <th>業務日誌の作成者</th>
            <th>登録日時</th>
        </tr>
        @foreach($logs as $log)
            <tr>
                <td>{!! link_to_route('logs.show', $log->id, [$log->id], ['class' => 'btn btn-success']) !!}</td>
                <td>{{ $log->date }}</td>
                <td>{!! link_to_route('users.show', $log->user->name, ['id' => $log->user->id], ['class' => 'text-info']) !!}</td>
                <td class="text-primary">{{ $log->created_at }}</td>
            </tr>
        @endforeach
    </table>
    {{ $logs->links('pagination::bootstrap-4') }}
    @else
    <div class="row mt-3">
        <p class="col-sm-12 text-center text-danger">※職員: {{ $user->name }} が記録した業務日誌はまだありません</p>
    </div>
    @endif
    
@endsection
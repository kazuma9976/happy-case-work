@extends('layouts.app')
@section('title', '職員: ' . $user->name . 'のプロフィール')
@section('content')
    <div class="text-center text-success mt-5">
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
            <th>自己紹介</th>
            <td>{{ $profile->introduction }}</td>
        </tr>
        
    </table>
    @else
    <div class="row mt-5">
        <p class="col-sm-12 text-center text-danger">※プロフィールは未設定です</p>
    </div>
    @endif
@endsection
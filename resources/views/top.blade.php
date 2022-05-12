@extends('layouts.app')
@section('title', 'Top')
@section('content')
    <div class="row mt-5">
        <h1 id="title" class="col-sm-12 text-center text-success mt-4 mb-3">利用者一覧</h1>
    </div>
    <div class="row">
        <p class="col-sm-12 text-left text-danger mt-2">※現在の登録利用者: {{ count($patients) }}人</p>
    </div>
    <table class="table table-bordered table-striped text-center">
            <tr>
                <th>ID</th>
                <th>利用者</th>
                <th>生年月日</th>
                <th>性別</th>
                <th>病名</th>
            </tr>
            @foreach($patients as $patient)
            <tr>
                <td>{!! link_to_route('records.index', $patient->id, ['id' => $patient->id ],['class' => 'btn btn-success']) !!}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->birthday }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->disease_name }}</td>
            </tr>
            @endforeach
    </table>
@endsection           
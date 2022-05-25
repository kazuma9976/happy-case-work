@extends('layouts.app')
@section('title', 'ブックマークした利用者一覧')
@section('content')
    <div class="row mt-5">
        <h1 id="title" class="col-sm-12 text-center text-success mt-3 mb-3">ブックマークした利用者一覧</h1>
    </div>
    
    @if($patients->total() !== 0)
    <div class="row mt-4">
        <p class="col-sm-12 text-left text-danger mt-2">※利用者: {{ $patients->total() }}人</p>
    </div>
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
        <p class="col-sm-12 text-center text-danger">※ブックマークした利用者はいません</p>
    </div>
    @endif
@endsection           
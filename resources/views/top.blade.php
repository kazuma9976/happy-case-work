@extends('layouts.app')
@section('title', 'Top')
@section('content')
            <div class="row mt-5">
                <h1 id="title" class="col-sm-12 text-center text-success mt-4 mb-3">利用者一覧</h1>
            </div>
            <table class="table table-bordered table-striped text-center mt-3">
                    <tr>
                        <th>ID</th>
                        <th>利用者</th>
                        <th>生年月日</th>
                        <th>性別</th>
                        <th>病名</th>
                    </tr>
                    @foreach($patients as $patient)
                    <tr>
                        <td>{!! link_to_route('patients.show', $patient->id, ['id' => $patient->id ],[]) !!}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->birthday }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->disease_name }}</td>
                    </tr>
                    @endforeach
            </table>
@endsection           
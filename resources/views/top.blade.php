@extends('layouts.app')
@section('title', 'Top')
@section('content')
    <div class="row mt-5">
        <h1 id="title" class="col-sm-12 text-center text-success mt-4 mb-3">利用者一覧</h1>
    </div>
    
    <!--利用者のキーワード検索-->
    <div class="row mt-3">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => ['patients.search'], 'method' => 'get']) !!}
                <div class="form-group">
                    {!! Form::label('keyword', '利用者検索: ', ['class' => 'text-primary'] ) !!}
                    {!! Form::text('keyword', $keyword, ['class' => 'form-control', 'placeholder' => '利用者ID(半角数字)、利用者名、病名のいずれかで検索可能']) !!}
                </div>
                {!! Form::submit('検索', ['class' => 'btn btn-secondary btn-block mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
    @if($patients->total() !== 0)
    <div class="row mt-4">
        <p class="col-sm-12 text-left text-danger mt-2">※登録利用者: {{ $patients->total() }}人</p>
    </div>
    <table class="table table-bordered table-striped text-center">
            <tr>
                <th>ID</th>
                <th>利用者名</th>
                <th>生年月日</th>
                <th>性別</th>
                <th>病名</th>
            </tr>
            @foreach($patients as $patient)
            <tr>
                <td>{!! link_to_route('records.index', $patient->id, ['id' => $patient->id ], ['class' => 'btn btn-success']) !!}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->birthday }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->disease_name }}</td>
            </tr>
            @endforeach
    </table>
    {{ $patients->links('pagination::bootstrap-4') }}
    @else
        <h2 class="mt-3 text-center text-danger">※登録利用者はいません</h2>
    @endif
@endsection           
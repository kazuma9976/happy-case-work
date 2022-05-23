@extends('layouts.app')
@section('title', '職員一覧')
@section('content')
    <div class="text-center text-success mt-5 pt-3">
        <h1>職員一覧</h1>
    </div>
    <div class="row">
        <table class="table table-bordered table-striped text-center mt-4">
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>登録日時</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{!! link_to_route('users.show', $user->id , ['id' => $user->id ], ['class' => "btn btn-success"]) !!}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
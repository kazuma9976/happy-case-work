@extends('layouts.app')
@section('title', '職員一覧')
@section('content')
    <div class="text-center text-success mt-5">
        <h1>職員一覧</h1>
    </div>
    @if($users->total() !== 0)
    <p class="text-danger mt-4">※登録職員 : {{ $users->total() }}人</p>
    <table class="table table-bordered table-striped text-center">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{!! link_to_route('users.show', $user->id , ['id' => $user->id], ['class' => 'btn btn-success']) !!}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </table>
    {{ $users->links('pagination::bootstrap-4') }}
    @else
    <div class="row mt-5">
        <h2 class="col-sm-12 text-center text-danger mt-5">※登録職員はいません</h2>
    </div>
    @endif
@endsection
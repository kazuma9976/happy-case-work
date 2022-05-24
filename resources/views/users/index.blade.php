@extends('layouts.app')
@section('title', '職員一覧')
@section('content')
    <div class="text-center text-success mt-5 pt-3">
        <h1>職員一覧</h1>
    </div>
    @if($users->total() !== 0)
    <p class="text-danger mt-4">※登録職員 : {{ $users->total() }}人</p>
    <div class="row">
        <table class="table table-bordered table-striped text-center">
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>プロフィール画像</th>
                <th>メールアドレス</th>
                <th>登録日時</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{!! link_to_route('users.show', $user->id , ['id' => $user->id ], ['class' => "btn btn-success"]) !!}</td>
                <td>{{ $user->name }}</td>
                <td>
                    @if($user->profile)
                    <img src="{{ asset('uploads')}}/{{ $user->profile->image }}" alt="プロフィール画像" id="image_icon_list">
                    @else
                    <img src="{{ asset('images/no_image_human.jpg') }}" alt="画像資料はありません" id="image_icon_list">
                    @endif
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    {{ $users->links('pagination::bootstrap-4') }}
    @else
        <h2 class="mt-5 text-center text-danger">※登録職員はいません</h2>
    @endif
@endsection
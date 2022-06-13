@extends('layouts.app')
@section('title', 'ダッシュボード')
@section('content')
    <div class="text-center">
        <h1 class="text-info pb-1">ダッシュボード</h1>
    </div>
    
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <p class="mt-3 text-primary text-center">ログインしました!</p>
@endsection

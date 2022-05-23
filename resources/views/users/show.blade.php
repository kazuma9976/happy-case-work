@extends('layouts.app')
@section('title', $user->name . 'さんのマイページ')
@section('content')
    <div class="text-center text-success mt-5 pt-3">
        <h1>{{ $user->name }} さんのマイページ</h1>
    </div>
@endsection
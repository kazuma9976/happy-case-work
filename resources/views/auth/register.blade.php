@extends('layouts.app')
@section('title', '新規職員登録')
@section('content')
            <div class="row mt-3">
                <h1 class="col-sm-12 text-center text-info pb-1 mt-3">新規職員登録</h1>
            </div>
            <div class="row mt-4">
                <form class="col-sm-12" method="POST" action="/signup">
                    <!-- 1行 -->
                    <div class="mb-3 row">
                        <label for="name" class="offset-sm-1 col-sm-2 col-form-label">名前 :</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" class="form-control" >
                        </div>
                    </div>
                    
                    <!-- 1行 -->
                    <div class="mb-3 row">
                        <label for="email" class="offset-sm-1 col-sm-2 col-form-label">メールアドレス :</label>
                        <div class="col-sm-6">
                            <input type="email" name="email" class="form-control" name="email">
                        </div>
                    </div>
                    
                    <!-- 1行 -->
                    <div class="mb-3 row">
                        <label for="password" class="offset-sm-1 col-sm-2 col-form-label">パスワード :</label>
                        <div class="col-sm-6">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    
                    <!-- 1行 -->
                    <div class="mb-3 row">
                        <label for="password_confirmation" class="offset-sm-1 col-sm-2 col-form-label">パスワードの確認:</label>
                        <div class="col-sm-6">
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                    
                    <!-- 1行 -->
                    <div class="row mt-5">
                            <button type="submit" class="offset-sm-4 col-sm-4 btn btn-primary">登録</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            
            <div class="row mt-4">
                <a href="/" class="offset-sm-4 col-sm-4 btn btn-danger">トップページに戻る</a>
            </div>
@endsection
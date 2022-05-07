@extends('layouts.app')
@section('title', 'ログイン')
@section('content')
            <div class="row mt-3">
                <h1 class="col-sm-12 text-center text-info pb-1 mt-3">ログイン画面</h1>
            </div>
            <div class="row mt-4">
                <form class="col-sm-12" action="/login" method="POST">
                    <!-- 1行 -->
                    <div class="mb-3 row">
                        <label class="offset-sm-1 col-sm-2 col-form-label">メールアドレス :</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    
                    <!-- 1行 -->
                    <div class="mb-3 row">
                        <label class="offset-sm-1 col-sm-2 col-form-label">パスワード :</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    
                    <!-- 1行 -->
                    <div class="row mt-5">
                            <button type="submit" class="offset-sm-4 col-sm-4 btn btn-primary">ログイン</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            
            <div class="row mt-5">
                <a href="index.php" class="offset-sm-4 col-sm-4 btn btn-danger">トップページに戻る</a>
            </div>
@endsection
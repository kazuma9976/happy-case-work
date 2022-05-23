<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 一般ユーザー
Route::group(['middleware' => ['guest']], function () {
    
    // プレビューした瞬間の設定
    Route::get('/', 'ToppagesController@index')->name('index');
    
    // ログイン認証系
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login.post');
    
    // ユーザ登録系
    Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
    Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');


});

// ユーザー認証必要
Route::group(['middleware' => ['auth']], function () {
    
    // ログイン後のリダイレクト先
    Route::get('/top', 'PatientsController@index')->name('patients.index');
    
    // ログアウト
    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
    
    // 利用者一覧、詳細表示
    Route::resource('patients', 'PatientsController');
    
    // 利用者のキーワード検索
    Route::get('search', 'PatientsController@search')->name('patients.search');
    
    // 業務日誌関係
    Route::resource('logs', 'LogsController');
    
    // 業務日誌のキーワード検索
    Route::get('logs.search', 'LogsController@search')->name('logs.search');
    
    // ネスト
    Route::group(['prefix' => 'patients/{id}'], function () {
        
        // 利用者に対する相談記録
        Route::resource('records', 'RecordsController');
        
        // 相談記録のキーワード検索
        Route::get('search', 'RecordsController@search')->name('records.search');
    });
    
    // ネスト
    Route::group(['prefix' => 'records/{id}'], function () {
        // 相談記録に対するコメント
        Route::post('comment', 'CommentsController@store')->name('comments.store');
    });
    

});


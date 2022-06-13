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
    Route::post('login', 'Auth\LoginController@login')->name('login');
    
    // ユーザー登録系
    Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
    Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
    
    // パスワードリセット系
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

});
    
// ユーザー認証必要
Route::group(['middleware' => ['auth']], function () {
    
    // ログイン後のリダイレクト先
    Route::get('/top', 'PatientsController@index')->name('patients.index');
    
    // ログアウト
    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
    
    // ユーザー一覧、詳細表示
    Route::resource('users', 'UsersController');
    
    // プロフィール関係
    Route::resource('profiles', 'ProfilesController');
    
    // 利用者一覧、詳細表示
    Route::resource('patients', 'PatientsController');
    
    // 利用者のキーワード検索
    Route::get('search', 'PatientsController@search')->name('patients.search');
    
    // 業務日誌関係
    Route::resource('logs', 'LogsController');
    
    // 業務日誌のキーワード検索
    Route::get('logs.search', 'LogsController@search')->name('logs.search');
    
    // ネスト
    Route::group(['prefix' => 'users/{id}'], function () {
        
        // ブックマークした利用者一覧
        Route::get('patient_bookmarks', 'UsersController@patient_bookmarks')->name('users.patient_bookmarks');
        
        // ブックマークした相談記録一覧
        Route::get('record_bookmarks', 'UsersController@record_bookmarks')->name('users.record_bookmarks');
        
        // ブックマークした業務日誌一覧
        Route::get('log_bookmarks', 'UsersController@log_bookmarks')->name('users.log_bookmarks');
        
        // ネスト
        Route::group(['prefix' => 'logs/{log_id}'], function () {
            
            // 業務日誌のブックマーク系
            Route::post('log_bookmark', 'Log_BookmarksController@store')->name('logs.bookmark');
            Route::delete('log_unbookmark', 'Log_BookmarksController@destroy')->name('logs.unbookmark');
            
        });
        
    });
    
    // ネスト
    Route::group(['prefix' => 'patients/{id}'], function () {
        
        // 利用者に対する相談記録
        Route::resource('records', 'RecordsController');
        
        // 利用者のブックマーク系
        Route::post('patient_bookmark', 'Patient_BookmarksController@store')->name('patients.bookmark');
        Route::delete('patient_unbookmark', 'Patient_BookmarksController@destroy')->name('patients.unbookmark');
        
        // ネスト
        Route::group(['prefix' => 'records/{record_id}'], function () {
            
            // 相談記録に対するコメント
            Route::resource('comment', 'CommentsController');
            
            // 相談記録のブックマーク系
            Route::post('record_bookmark', 'Record_BookmarksController@store')->name('records.bookmark');
            Route::delete('record_unbookmark', 'Record_BookmarksController@destroy')->name('records.unbookmark');
            
        });
        
        // 相談記録のキーワード検索
        Route::get('search', 'RecordsController@search')->name('records.search');
        
    });
    
    

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

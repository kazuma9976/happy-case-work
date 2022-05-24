<?php

namespace App\Http\Controllers;

use App\User; // 追加
use App\Profile; // 追加
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Userモデルを使って、全ユーザーデータを取得
        $users = User::orderBy('id', 'asc')->paginate(10);
        // viewの呼び出し
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // 注目している職員のプロフィールデータ取得
        $profile = $user->profile()->get()->first();
        // 注目している職員が記録した相談記録データ一覧を取得
        $records = $user->records()->paginate(5);
        // 注目している職員が記録した業務日誌データ一覧を取得
        $logs = $user->logs()->paginate(5);
        
        // view の呼び出し
        return view('users.show', compact('user', 'profile', 'records', 'patients', 'logs'));
    }

}

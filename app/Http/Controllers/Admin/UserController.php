<?php

namespace App\Http\Controllers\Admin;

use App\User; // 追加
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //追加

class UserController extends Controller
{
    // ログインしている職員のアカウントのデータの編集
    public function edit() {
        
        // viewの表示
        return view('user.edit', ['user' => Auth::user()]);
    }
    
    // ログインしている職員のアカウントのデータの保存
    public function update(Request $request) {
        
        // validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        
        // 入力値の取得
        $name = $request->input('name');
        $email = $request->input('email');
    
        // ログインしている職員情報の取得
        $user = Auth::user();
        
        // 入力情報をもとにアカウント情報を変更
        $user->name = $name;
        $user->email = $email;
        
        // データベースの保存
        $user->save();
        
        // リダイレクト
        return redirect('/users/' . \Auth::user()->id)->with('flash_message', 'アカウント情報を更新しました。');
    }
    
}

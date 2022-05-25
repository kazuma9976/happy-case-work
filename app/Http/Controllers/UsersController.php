<?php

namespace App\Http\Controllers;

use App\User; // 追加
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
        // 注目している職員のプロフィールを取得
        $profile = $user->profile()->get()->first();
        
        // 注目している職員が登録した利用者一覧を取得
        $patients = $user->patients()->paginate(5);
        
        // 注目している職員が記録した相談記録一覧を取得
        $records = $user->records()->paginate(5);
        
        // 注目している職員が記録した業務日誌一覧を取得
        $logs = $user->logs()->paginate(5);
        
        // view の呼び出し
        return view('users.show', compact('user', 'patients', 'profile', 'records','logs'));
    }
    
    // 注目している職員がブックマークした利用者一覧
    public function patient_bookmarks($id){
        $user = User::find($id);
        $patients = $user->patient_bookmarks()->paginate(10);
        
        // view の呼び出し
        return view('users.patient_bookmarks', compact('user', 'patients'));
    }
    
    // 注目している職員がブックマークした相談記録一覧
    public function record_bookmarks($id){
        $user = User::find($id);
        $records = $user->record_bookmarks()->paginate(10);
        
        // view の呼び出し
        return view('users.record_bookmarks', compact('user', 'records'));
    }
    
    // 注目している職員がブックマークした業務日誌一覧
    public function log_bookmarks($id){
        $user = User::find($id);
        $logs = $user->log_bookmarks()->paginate(10);
        
        // view の呼び出し
        return view('users.log_bookmarks', compact('user', 'logs'));
    }
    

}

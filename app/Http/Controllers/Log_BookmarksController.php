<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Log_BookmarksController extends Controller
{
    public function store(Request $request, $user_id, $log_id)
    {
        // 業務日誌のブックマーク追加
        \Auth::user()->log_bookmark($log_id);
        return back()->with('flash_message', 'この業務日誌をブックマークしました');
    }
    
     public function destroy($user_id, $log_id)
    {
        // 業務日誌のブックマーク解除
        \Auth::user()->log_unbookmark($log_id);
        return back()->with('flash_message', 'この業務日誌のブックマークを解除しました');
    }
}

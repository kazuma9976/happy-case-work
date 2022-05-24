<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Record_BookmarksController extends Controller
{
    public function store(Request $request, $patient_id, $record_id)
    {
        // 相談記録のブックマーク追加
        \Auth::user()->record_bookmark($record_id);
        return back()->with('flash_message', 'この相談記録をブックマークしました');
    }
    
     public function destroy($patient_id, $record_id)
    {
        // 相談記録のブックマーク解除
        \Auth::user()->record_unbookmark($record_id);
        return back()->with('flash_message', 'この相談記録のブックマークを解除しました');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Patient_BookmarksController extends Controller
{
    public function store(Request $request, $id)
    {
        // 利用者のブックマーク追加
        \Auth::user()->patient_bookmark($id);
        return back()->with('flash_message', 'この利用者をブックマークしました');
    }
    
     public function destroy($id)
    {
        // 利用者のブックマーク解除
        \Auth::user()->patient_unbookmark($id);
        return back()->with('flash_message', 'この利用者のブックマークを解除しました');
    }
}

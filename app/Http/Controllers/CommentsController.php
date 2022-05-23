<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Patient; // 追加
use App\Record; // 追加

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $patient_id, $record_id)
    {
        // validation
        $this->validate($request, [
            'content' => 'required',
            'open_flag' => 'required',
        ]);
        
       
        // 注目している利用者とその相談記録の情報を取得
        $patient = Patient::find($patient_id);
        $record = Record::find($record_id);
        
        // 入力情報の取得
        $content = $request->input('content');
        $open_flag = $request->input('open_flag');
        
        // 入力情報をデータベースに保存
        \Auth::user()->add_comment($record_id, $content, $open_flag);
    
        // リダイレクト
        return redirect('patients/' . $patient_id . '/records/' . $record_id)->with('flash_message', '新規コメント投稿を完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

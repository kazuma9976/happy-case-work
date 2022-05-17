<?php

namespace App\Http\Controllers;

use App\Record;
use App\Patient; // 追加
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // 注目する利用者とその相談記録一覧の情報を取得
        $patient = Patient::find($id);
        $records = $patient->records()->paginate(10);
        
        // view の呼び出し
        // ある利用者とその相談記録一覧を表示させる
        return view('patients.records', compact('patient', 'records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // 新しいRecordインスタンスを作成し、注目する利用者の情報を取得
        $record = new Record();
        $patient = Patient::find($id);
        
        // view の呼び出し
        return view('patients.records_create', compact('record', 'patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 入力された値の検証
        $this->validate($request, [
            'image' => [
                'file',
                'mimes:jpeg,jpg,png'
            ]
        ]);
        
        // 入力情報の取得
        $patient_id = $request->input('patient_id');
        $content = $request->input('content');
        $file =  $request->image;
        
        // 画像のアップロード
        // https://qiita.com/ryo-program/items/35bbe8fc3c5da1993366
        if($file){
            // 現在時刻ともともとのファイル名を組み合わせてランダムなファイル名作成
            $image = time() . $file->getClientOriginalName();
            // アップロードするフォルダ名取得
            $target_path = public_path('uploads/');
            // アップロード処理
            $file->move($target_path, $image);
        }else{
            // 画像が選択されていなければ空文字をセット
            $image = '';
        }
        
        // 入力情報をもとに新しいpatientインスタンス作成
        \Auth::user()->add_record($patient_id, $content, $image);
       
        // トップページへリダイレクト
        return redirect('/patients/' . $patient_id . '/records')->with('flash_message', '新規相談記録を作成しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, $record_id)
    {
        // 加工した記録番号の取得
        $index = $request->input('index');
        // 注目する利用者とその相談記録の情報を取得
        $patient = Patient::find($id);
        $record = Record::find($record_id);
        
        // view の呼び出し
        return view('records.show', compact('patient', 'record', 'index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, $record_id)
    {
        $index = $request->input('index');
        // 注目する利用者とその相談記録の情報を取得
        $patient = Patient::find($id);
        $record = Record::find($record_id);
        // view の呼び出し
        return view('records.edit', compact('patient', 'record', 'index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $record_id)
    {
        // 注目している利用者とその相談記録の情報を取得
        $patient = Patient::find($id);
        $record = Record::find($record_id);
        
        // 加工した記録番号の取得
        $index = $request->input('index');
        
        // 入力値の検証
        $this->validate($request, [
            'image' => [
                'file',
                'mimes:jpeg,jpg,png'
            ]
        ]);
        
        // 入力情報の取得
        $patient_id = $request->input('patient_id');
        $content = $request->input('content');
        $file =  $request->image;
        
        // 画像のアップロード
        // https://qiita.com/ryo-program/items/35bbe8fc3c5da1993366
        if($file){
            // 現在時刻ともともとのファイル名を組み合わせてランダムなファイル名作成
            $image = time() . $file->getClientOriginalName();
            // アップロードするフォルダ名取得
            $target_path = public_path('uploads/');
            // アップロード処理
            $file->move($target_path, $image);
        }else{
            // 画像が選択されていなければ、元の画像名のまま
            $image = $record->image;
        }
        
        // 入力情報をもとにrecordインスタンス情報を更新
        $record->content = $content;
        $record->image = $image;
        
        // データベースを更新
        $record->save();
       
        // トップページへリダイレクト
        return redirect('/patients/' . $patient_id . '/records')->with('flash_message', $patient->name . 'の記録番号: ' . $index . 'を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, $record_id)
    {
        // 注目している利用者とその相談記録の情報を取得
        $patient = Patient::find($id);
        $record = Record::find($record_id);
        $patient_id = $request->input('patient_id');
        
        // 加工した記録番号の取得
        $index = $request->input('index');
        
        // その相談記録の情報をデータベースから削除
        $record->delete($record_id);
        // リダイレクト
        return redirect('/patients/' . $patient_id . '/records')->with('flash_message', $patient->name . 'の相談記録を1件削除しました');
    }
}

<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Logモデルを使って全投稿を取得
        $logs = Log::orderBy('id', 'desc')->paginate(10);
        
        // キーワードは空文字の設定
        $keyword = '';
        
        // viewの呼び出し
        return view('logs', compact('logs', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 空のLogモデル作成
        $log = new Log();
        // view の呼び出し
        return view('logs.create', compact('log')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        //for image ref) https://qiita.com/maejima_f/items/7691aa9385970ba7e3ed
        $this->validate($request, [
            'date' => 'required',
            'weather' => 'required',
            'staff' => 'required',
            'image' => [
                'file',
                'mimes:jpeg,jpg,png'
            ]
        ]);
        
        // 入力情報の取得
        $date = $request->input('date');
        $weather = $request->input('weather');
        $staff = $request->input('staff');
        $notice = $request->input('notice');
        $phone_record = $request->input('phone_record');
        $mail_record = $request->input('mail_record');
        $meeting = $request->input('meeting');
        $business_trip = $request->input('business_trip');
        $training = $request->input('training');
        $file =  $request->image;
        $other = $request->input('other');
        
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
        
        
        // 入力情報をもとに新しいインスタンス作成
        \Auth::user()->logs()->create([
            'date' => $date,
            'weather' => $weather,
            'staff' => $staff,
            'notice' => $notice,
            'phone_record' => $phone_record,
            'mail_record' => $mail_record,
            'meeting' => $meeting,
            'business_trip' => $business_trip,
            'training' => $training,
            'image' => $image,
            'other' => $other
        ]);
        
        // 業務日誌一覧へリダイレクト
        return redirect('logs')->with('flash_message', '新規業務日誌を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        // viewの呼び出し
        return view('logs.show', compact('log'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        // viewの呼び出し
        return view('logs.edit', compact('log'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        // validation
        //for image ref) https://qiita.com/maejima_f/items/7691aa9385970ba7e3ed
        $this->validate($request, [
            'date' => 'required',
            'weather' => 'required',
            'staff' => 'required',
            'image' => [
                'file',
                'mimes:jpeg,jpg,png'
            ]
        ]);
        
        // 入力情報の取得
        $date = $request->input('date');
        $weather = $request->input('weather');
        $staff = $request->input('staff');
        $notice = $request->input('notice');
        $phone_record = $request->input('phone_record');
        $mail_record = $request->input('mail_record');
        $meeting = $request->input('meeting');
        $business_trip = $request->input('business_trip');
        $training = $request->input('training');
        $file =  $request->image;
        $other = $request->input('other');
        
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
            $image = $log->image;
        }
        
        
        // 入力情報をもとにインスタンス情報の更新
        $log->date = $date;
        $log->weather = $weather;
        $log->staff = $staff;
        $log->notice = $notice;
        $log->phone_record = $phone_record;
        $log->mail_record = $mail_record;
        $log->meeting = $meeting;
        $log->business_trip = $business_trip;
        $log->training = $training;
        $log->image = $image;
        $log->other = $other;
        
        // データベースを更新
        $log->save();
        
        // 業務日誌一覧へリダイレクト
        return redirect('logs')->with('flash_message', '記録番号: ' . $log->id . 'の業務日誌を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        // データベースから削除
        $log->delete();
        
        // 業務日誌一覧へリダイレクト
        return redirect('logs')->with('flash_message', '記録番号: ' . $log->id . 'の業務日誌を削除しました');
    }
    
    // 業務日誌のキーワード検索
    public function search(Request $request){
        
        // 入力された検索キーワードを取得
        $keyword = $request->input('keyword');

        // 検索(日付、職員で検索可能にする)
        $logs = Log::where('id', 'like', '%' . $keyword . '%')
                    ->orWhere('staff', 'like', '%' . $keyword . '%')
                    ->paginate(10);
       
        // キーワードがなければフラッシュメッセージをnull
        if($keyword === null) {
           $flash_message = null;
           
        // キーワードがヒットしなければ  
        } else if($logs->count() === 0) {
            $flash_message = '検索キーワード: 『 ' . $keyword . ' 』に何もヒットしませんでした。';
           
        } else {
            // フラッシュメッセージのセット
            $flash_message = '検索キーワード: 『 ' . $keyword . ' 』に' . $logs->count() . '件ヒットしました';
        }
       
         // view の呼び出し
         return view('logs', compact('logs', 'keyword', 'flash_message'));
    }
}

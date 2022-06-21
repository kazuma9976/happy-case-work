<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User; // 追加
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 空のプロフィールインスタンス作成
        $profile = new Profile();
        // view の呼び出し
        return view('profiles.create', compact('profile'));
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
            'nickname' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'introduction' => 'required',
            'image' => [
                'file',
                'mimes:jpeg,jpg,png'
            ]
        ]);
        
        // 入力情報の取得
        $nickname = $request->input('nickname');
        $gender = $request->input('gender');
        $department = $request->input('department');
        $introduction = $request->input('introduction');
        $file =  $request->image;
        
        if($file !== null){
            // S3用
            $path = Storage::disk('s3')->putFile('/uploads', $file, 'public');
     
            // パスから、最後の「ファイル名.拡張子」の部分だけ取得
            $image = basename($path);
            
        } else {
            // 画像を選択しない場合は空にする。
            $image = '';
        }
        
        // 入力情報をもとに新しいプロフィールを作成
        \Auth::user()->profile()->create([
            'nickname' => $nickname, 
            'gender' => $gender, 
            'department' => $department, 
            'introduction' => $introduction, 
            'image' => $image
        ]);
        
        // 職員詳細ページへリダイレクト
        return redirect('/users/' . \Auth::user()->id)->with('flash_message', '職員プロフィールを作成しました');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        // ログインしている自分のプロフィールの場合
        if($profile->user_id === \Auth::id()){
            // view の呼び出し
            return view('profiles.edit', compact('profile'));
        } else {
            return redirect('/top');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        // ログインしている自分のプロフィールの場合
        if($profile->user_id === \Auth::id()){
            // validation
            //for image ref) https://qiita.com/maejima_f/items/7691aa9385970ba7e3ed
            $this->validate($request, [
                'nickname' => 'required',
                'gender' => 'required',
                'department' => 'required',
                'introduction' => 'required',
                'image' => [
                    'file',
                    'mimes:jpeg,jpg,png'
                ]
            ]);
            
            // 入力情報の取得
            $nickname = $request->input('nickname');
            $gender = $request->input('gender');
            $department = $request->input('department');
            $introduction = $request->input('introduction');
            $file =  $request->image;
            
            // 画像ファイルのアップロード
            if($file){
                // S3用
                $path = Storage::disk('s3')->putFile('/uploads', $file, 'public');
         
                // パスから、最後の「ファイル名.拡張子」の部分だけ取得
                $image = basename($path);
            }else{
                // 画像を選択していなければ、画像ファイルは元の名前のまま
                $image = $profile->image;
            }
            
            
            // 入力情報をもとにプロフィールを変更
            $profile->nickname = $nickname;
            $profile->gender = $gender;
            $profile->department = $department;
            $profile->introduction = $introduction;
            $profile->image = $image;
            
            // データベース更新
            $profile->save();
    
            // 職員詳細ページへリダイレクト
            return redirect('/users/' . $profile->user->id)->with('flash_message', '職員プロフィールを更新しました。');
        } else {
            return redirect('/top');
        }
    }

}

<?php

namespace App;
use App\Patient; // 追加
use App\Record; // 追加
use App\Log; // 追加
use App\Comment; // 追加
use App\Profile; // 追加

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword; // 追加

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
    * パスワードリセット通知の送信
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    
    /**
     * この職員が登録した利用者（Patientsモデルとの1対多の関係を定義）
     */
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    
    /**
     * この職員が色んな利用者へ書いた相談記録一覧（Recordモデルとの1対多の関係を定義）
     */
    public function records() {
        return $this->hasMany(Record::class);
    } 
    
    // 利用者への相談記録の記入
    public function add_record($patient_id, $content, $image){
        $record = new Record();
        $record->user_id = $this->id;
        $record->patient_id = $patient_id;
        $record->content = $content;
        $record->image = $image;
        $record->save();
    }
    
    /**
     * このユーザーが記録した業務日誌一覧　(Logモデルとの1対多の関係を定義)
     */
    public function logs()
    {
        return $this->hasMany(Log::class);
    }
    
    /**
     * この職員が所有するコメント(利用者の相談記録に対してのコメント)一覧（Commentモデルとの1対多の関係を定義）
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    // コメント投稿
    public function add_comment($record_id, $content, $open_flag){
        $comment = new Comment();
        $comment->user_id = $this->id;
        $comment->record_id = $record_id;
        $comment->content = $content;
        $comment->open_flag = $open_flag;
        $comment->save();
        
    }
    
    // Profileモデルと1対1のリレーションを張る
    public function profile()
    {
        // Profileモデルのデータを引っ張てくる
        return $this->hasOne(Profile::class);
    }
    
    /*
     * この職員がブックマークした相談記録一覧(中間テーブルを介して取得)
    */
    public function record_bookmarks()
    {
        return $this->belongsToMany(Record::class, 'record_bookmarks', 'user_id', 'record_id')->withTimestamps();
    }
    
    // 注目する相談記録がすでにブックマークされているかどうかの判定
    public function is_record_bookmark($record_id)
    {
        return $this->record_bookmarks()->where('record_id', $record_id)->exists();
    }
    
    // 相談記録のブックマーク追加
    public function record_bookmark($record_id)
    {
        // すでにブックマークしているかの確認
        $exist = $this->is_record_bookmark($record_id);
        
        if($exist) {
            // すでにブックマークしていれば何もしない
            return false;
        } else {
            // ブックマークしていないのであればブックマークする
            $this->record_bookmarks()->attach($record_id);
            return true;
        }
    }
    
    // 相談記録のブックマーク解除
    public function record_unbookmark($record_id)
    {
        // すでにブックマークしているかの確認
        $exist = $this->is_record_bookmark($record_id);
        
        if($exist) {
            // すでにブックマークしていればブックマークを解除
            $this->record_bookmarks()->detach($record_id);
            return true;
        } else {
            // ブックマークしていない場合
            return false;
        }
    }
    
    /*
     * この職員がブックマークした業務日誌記録一覧(中間テーブルを介して取得)
    */
    public function log_bookmarks()
    {
        return $this->belongsToMany(Log::class, 'log_bookmarks', 'user_id', 'log_id')->withTimestamps();
    }
    
    // 注目する業務日誌がすでにブックマークされているかどうかの判定
    public function is_log_bookmark($log_id)
    {
        return $this->log_bookmarks()->where('log_id', $log_id)->exists();
    }
    
    // 業務日誌のブックマーク追加
    public function log_bookmark($log_id)
    {
        // すでにブックマークしているかの確認
        $exist = $this->is_log_bookmark($log_id);
        
        if($exist) {
            // すでにブックマークしていれば何もしない
            return false;
        } else {
            // ブックマークしていないのであればブックマークする
            $this->log_bookmarks()->attach($log_id);
            return true;
        }
    }
    
    // 業務日誌のブックマーク解除
    public function log_unbookmark($log_id)
    {
        // すでにブックマークしているかの確認
        $exist = $this->is_log_bookmark($log_id);
        
        if($exist) {
            // すでにブックマークしていればブックマークを解除
            $this->log_bookmarks()->detach($log_id);
            return true;
        } else {
            // ブックマークしていない場合
            return false;
        }
    }
    
    /*
     * この職員がブックマークした利用者一覧(中間テーブルを介して取得)
    */
    public function patient_bookmarks()
    {
        return $this->belongsToMany(Patient::class, 'patient_bookmarks', 'user_id', 'patient_id')->withTimestamps();
    }
    
    // 注目する利用者がすでにブックマークされているかどうかの判定
    public function is_patient_bookmark($patient_id)
    {
        return $this->patient_bookmarks()->where('patient_id', $patient_id)->exists();
    }
    
    // 利用者のブックマーク追加
    public function patient_bookmark($patient_id)
    {
        // すでにブックマークしているかの確認
        $exist = $this->is_patient_bookmark($patient_id);
        
        if($exist) {
            // すでにブックマークしていれば何もしない
            return false;
        } else {
            // ブックマークしていないのであればブックマークする
            $this->patient_bookmarks()->attach($patient_id);
            return true;
        }
    }
    
    // 業務日誌のブックマーク解除
    public function patient_unbookmark($patient_id)
    {
        // すでにブックマークしているかの確認
        $exist = $this->is_patient_bookmark($patient_id);
        
        if($exist) {
            // すでにブックマークしていればブックマークを解除
            $this->patient_bookmarks()->detach($patient_id);
            return true;
        } else {
            // ブックマークしていない場合
            return false;
        }
    }
    
}

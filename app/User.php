<?php

namespace App;
use App\Patient; // 追加
use App\Record; // 追加
use App\Log; // 追加
use App\Comment; // 追加

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    
    // ログインした職員が記録を書いた利用者一覧を表示
    public function record_patients() {
        return $this->belongsToMany(Patient::class, 'records', 'user_id', 'patient_id')->withTimestamps();
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
    public function add_comment($record_id, $content){
        $comment = new Comment();
        $comment->user_id = $this->id;
        $comment->record_id = $record_id;
        $comment->content = $content;
        $comment->save();
        
    }
}

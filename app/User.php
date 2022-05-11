<?php

namespace App;
use App\Patient; // 追加
use App\Record; // 追加

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
     * このユーザーが登録した利用者（Patientsモデルとの1対多の関係を定義）
     */
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    
    /**
     * このユーザーが色んな利用者へ書いた相談記録一覧（Recordモデルとの1対多の関係を定義）
     */
    public function records() {
        return $this->hasMany(Record::class);
    } 
    
    // 利用者への相談記録の記入
    public function add_record($patient_id, $recording_date, $content, $image){
        $record = new Record();
        $record->user_id = $this->id;
        $record->patient_id = $patient_id;
        $record->recording_date = $recording_date;
        $record->content = $content;
        $record->image = $image;
        $record->save();
    }
    
    
}

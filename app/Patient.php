<?php

namespace App;
use App\User; // 追加
use App\Record; // 追加
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'birthday',
        'gender',
        'postal_code',
        'address',
        'phone_number',
        'email',
        'emergency_contact',
        'family_hospital',
        'disease_name',
        'clinical_history',
        'medical_history',
        'life_history',
        'family_structure',
        'academic_background',
        'work_experience',
        'economic_condition',
        'related_organization',
        'welfare_service',
        'image',
        'consideration',
        'other',
    ];
    
    /**
     * 利用者を登録したユーザー。（Userモデルとの多対1の関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この利用者に相談記録を記入したユーザ一覧（中間テーブルを介して取得）
     * どのユーザーがどの利用者に記録したかを明確にするためTimestamps();も一緒にさせる。
     */
    public function record_users(){
        return $this->belongsToMany(User::class, 'records', 'patient_id', 'user_id')->withTimestamps();
    }
    
    /**
     * この利用者に記録された相談記録一覧（Recordモデルとの1対多の関係を定義）
     */
    public function records(){
        return $this->hasMany(Record::class);
    }
}

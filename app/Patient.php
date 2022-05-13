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
        'phone_number_1',
        'phone_number_2',
        'email',
        'emergency_contact_1',
        'emergency_contact_postal_code_1',
        'emergency_contact_address_1',
        'emergency_contact_2',
        'emergency_contact_postal_code_2',
        'emergency_contact_address_2',
        'family_hospital',
        'family_hospital_contact',
        'family_hospital_postal_code',
        'family_hospital_address',
        'doctor',
        'disease_name',
        'visits',
        'prescription',
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

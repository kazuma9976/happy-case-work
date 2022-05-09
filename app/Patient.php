<?php

namespace App;
use App\User; // 追加
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
}

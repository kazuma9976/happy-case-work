<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User; // 追加

class Profile extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'gender', 'introduction', 'image',
    ];
    
    // Userモデルと1対1のリレーションを張る
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

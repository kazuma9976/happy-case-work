<?php

namespace App;
use App\User; // 追加
use App\Record; // 追加

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'record_id', 'content'];
    
    /**
     * このコメントを所有する相談記録。(Recordモデルとの多対1の関係を定義)
     */
    public function record(){
        return $this->belongsTo(Record::class);
    }
    
    /**
     * この相談記録を所有する職員。(Userモデルとの多対1の関係を定義)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

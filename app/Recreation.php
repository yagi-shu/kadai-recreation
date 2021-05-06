<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recreation extends Model
{

    protected $fillable = [
        'name',
        'type',
        'max_number',
        'min_number',
        'time',
        'budget',
        'service',
        'content'
    ];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite_users()
    {
        return $this->belongsTo(User::class, 'favorites','recreation_id','user_id')->withTimestamps();
    }
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function recreatoin()
    {
        return $this->belongsTo(Recreation::class);
    }
    
}

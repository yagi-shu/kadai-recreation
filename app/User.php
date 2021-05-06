<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
    
     public function recreations()
    {
        return $this->hasMany(Recreation::class);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Recreation::class, 'favorites','user_id','recreation_id')->withTimestamps();
    }
    
    public function favorite($recreationId)
    {
        $exist = $this->is_favorite($recreationId);
        
        if ($exist) {
            return false;
        }else {
            $this->favorites()->attach($recreationId);
            return true;
        }
    }
    
    public function unfavorite($recreationId)
    {
        $exist = $this->is_favorite($recreationId);
        
        if ($exist) {
            $this->favorites()->detach($recreationId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_favorite($recreationId)
    {
        return $this->favorites()->where('recreation_id',$recreationId)->exists();
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('recreations','favorites');
    }
}

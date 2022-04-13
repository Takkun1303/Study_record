<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

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
     * 論理削除
     */
    use SoftDeletes;
    
    /**
     * booksテーブルとのリレーション
     */
    public function books()
    {
        return $this->hasMany('App\Book');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function nices()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
    
    public function comments()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    public function getPaginateByLimit(int $limit_count=5)
    {
        $id=Auth::id();
        return $this->where('user_id',$id)->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    public function postsPaginateByLimit(int $limit_count=10)
    {
        $id=Auth::id();
        return $this->posts()->where('user_id',$id)->with('book')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
    'name',
    'user_id'
    ];
    
    use SoftDeletes;
    
    public function user()
    {
        return $this->belongsTo('App\User');    
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post'); 
    }
}

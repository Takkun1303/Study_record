<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable =[
    'file_name',
    'file_path',
    'post_id'
    ];
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
}

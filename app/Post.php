<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    public function getPaginateByLimit(int $limit_count=10)
    {
        return $this::with(['user', 'book'])->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
    'text',
    'learning_hours',
    'user_id',
    'book_id',
    'file_name',
    'file_path'
    ];
    
    use SoftDeletes;
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function book()
    {
        return $this->belongsTo('App\Book')->withTrashed();
    }
}

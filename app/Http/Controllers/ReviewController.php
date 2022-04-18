<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class ReviewController extends Controller
{
    
    public function index(Request $request,Post $post) 
    {
        $data = $post
                ->select('created_at as start')
                ->where('user_id',Auth::id())
                ->get();
        
        
        return view('review.index');
    }
        
        
}

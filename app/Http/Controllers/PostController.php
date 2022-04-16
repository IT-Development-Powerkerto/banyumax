<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
Use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
    //     $blog = Post::latest();
        
    //     if(request('search')) {
    //         $blog->where('title','like', '%'.request('search').'%')
    //            ->orWhere('body', 'like', '%'.request('search').'%');
    
    //     }

    //Query WHEN
        // $blog = Post::when(request('search'),function($query){
        // return $query->where('title','like', '%'.request('search').'%')
        //     ->orWhere('body', 'like', '%'.request('search').'%');
        // });

        return view('blog', [
            "title" => "All Posts" . $title,
            // "active" => "blog",
            "post"=>Post::latest()->filter(request(['search', 'category','author']))
                                ->paginate(4)
                                ->withQueryString()
        ]);   
    }
    
    public function show(Post $post) {
        return view('post', [
            "title" => "Single Post",
            "active" => "post",
            "post" => $post
        ]);
    }
}

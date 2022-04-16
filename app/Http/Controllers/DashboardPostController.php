<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('dashboard.blog.index', [
        //     'blog' => Post::where('user_id', Auth()->user()->id)->get(),
        // ]);

        $users = User::all();
        return view('dashboard')->with('user',$users);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('dashboard.blog.create',[
        'categories' => Category::all()
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('post-images');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024', //max = maximal ukuran, min = minimal ukuran, size = persis berapa
            'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Post::create($validatedData);

        return redirect('/dashboard/blog')->with('success','New Post Has Been Added! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $blog)
    {
        return view('dashboard.blog.show', [
            'post' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $blog)
    {
        return view('dashboard.blog.edit',[
            'categories' => Category::all(),
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $blog)
    {
        $rules =[
            'title' => 'required|max:255',
            'category_id' => 'required',
            //eror karena slug sudah ada
            // 'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024', //max = maximal ukuran, min = minimal ukuran, size = persis berapa
            'body' => 'required'
        ];

        if($request->slug != $blog->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request -> validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');

        }


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::where('id', $blog->id)
            ->update($validatedData);

        return redirect('/dashboard/blog')->with('success','Post Has Been Update! ');

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        if($blog->image) {
            Storage::delete($blog->image);
        }
        Post::destroy($blog->id);

        return redirect('/dashboard/blog')->with('success','Post has been deleted ');
    }

    public function checkSlug(Request $request) {

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

}

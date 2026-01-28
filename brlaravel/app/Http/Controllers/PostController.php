<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view("post.index",compact('posts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create',compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string',
            'category_id'=>'required|exists:categories,id',
        ]);
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('post.show',compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('post.edit');
        //
    }

//   
     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string',
            'category_id'=>'required|exists:categories,id',
        ]);
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route('post.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $post = Post::find($id);
        $post->delete();

        return redirect()->route('post.index');
    }
}



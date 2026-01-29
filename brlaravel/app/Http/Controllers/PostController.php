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
    public function index(Request $request)
    {
        $categories = Category::all();
      if($request->has('category') && $request->category != ''){

        $posts = Post::with('category')->where('category_id',$request->category)->get();
      }
      else{
        $posts = Post::with('category')->get();
      }
      return view('post.index',compact('posts','categories'));
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
        return redirect('/post/index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show',compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
         $categories = Category::all();

        return view('post.edit',compact('post','categories'));
    }

//   
     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Post $post )
    {
       $validated = $request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string',
            'category_id'=>'required|exists:categories,id',
        ]);

        $post->update($validated);
        return redirect('/post/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
         $post->delete();
        return redirect('/post/index');
    }
}



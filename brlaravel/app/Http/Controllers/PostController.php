<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("post.index",compact('posts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); 
        return view('posts.create', compact('categories'));
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
        return view('posts.show',compact('post'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
        //
    }

//     public function edit(string $id)
// {
//     $post = Post::findOrFail($id);
//     $categories = Category::all(); // Get all categories
//     return view('posts.edit', compact('post', 'categories'));
// }

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
        return redirect()->route('posts.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
        //
    }
}



// php artisan make:test PostTest


// <?php

// namespace Tests\Feature;

// use App\Models\Post;
// use App\Models\Category;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Tests\TestCase;

// class PostTest extends TestCase
// {
//     use RefreshDatabase; // باش كل مرة تنفذ الاختبار، تتفكك وتبني قاعدة البيانات من جديد

//     /** @test */
//     public function it_can_create_a_post()
//     {
//         $category = Category::factory()->create(); // غادي تخلق Category

//         $response = $this->post('/posts', [
//             'title' => 'Test Post',
//             'body' => 'This is a test post body.',
//             'category_id' => $category->id,
//         ]);

//         $response->assertStatus(302); // التأكد من أن الرد هو إعادة توجيه (Redirect)
//         $this->assertDatabaseHas('posts', [
//             'title' => 'Test Post',
//             'body' => 'This is a test post body.',
//         ]);
//     }
// }



// public function it_can_update_a_post()
// {
//     $category = Category::factory()->create();
//     $post = Post::create([
//         'title' => 'Old Title',
//         'body' => 'Old body content.',
//         'category_id' => $category->id,
//     ]);

//     $response = $this->put("/posts/{$post->id}", [
//         'title' => 'Updated Title',
//         'body' => 'Updated body content.',
//         'category_id' => $category->id,
//     ]);

//     $response->assertRedirect('/posts');
//     $this->assertDatabaseHas('posts', [
//         'title' => 'Updated Title',
//         'body' => 'Updated body content.',
//     ]);
// }

// php artisan test

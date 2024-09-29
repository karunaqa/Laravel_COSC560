<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Date;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Retrieve all posts created by the currently authenticated user
    $posts = Post::where('user_id', Auth::id())->get();

    // Return the view with the posts
    return view('author.posts.index', compact('posts'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new post
        return view('author.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        // Create a new post with the user_id of the logged-in user
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(), // Store the logged-in user's ID
        ]);
    
        // Redirect to the posts index page
        return redirect()->route('author.posts.index')->with('success', 'Post created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Uncomment the following lines to enforce authorization
        // if(Auth::id() != $post->user_id){
        //     abort(403); // Forbidden if the user is not the owner of the post
        // }
        
        // Return the view with the specific post details
        return view('author.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Return the view for editing the specified post
        return view('author.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        // Update the post with the request data
        $post->update($request->all());
        // Redirect to the posts index page
        return redirect()->route('author.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete the specified post
        $post->delete();
        // Redirect back to the previous page
        return redirect()->back();
    }

    public function test()
    {
       $results = User::where('created_at','>', new DateTime('2024-07-21 06:28:46'))->get();
        dd($results);
    }
}

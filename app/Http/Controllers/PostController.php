<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use App\Http\Controllers\DateTime;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all posts
        $posts = Post::all();
        
        // Return the view with the paginated posts
        return view('Posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new post
        return view('Posts.create');
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

        // Create a new post using the request data
        Post::create($request->all());
        // Redirect to the posts index page
        return redirect()->route('posts.index');
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
        return view('Posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Return the view for editing the specified post
        return view('Posts.edit', compact('post'));
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
        return redirect()->route('posts.index');
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
       $results = User::where('created_at','>', now()->subYears(2))->get();
        dd($results);
    }
}
 
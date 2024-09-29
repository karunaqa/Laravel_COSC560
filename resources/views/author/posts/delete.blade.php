@extends('layouts.admin_layout')

@section('content')
    <!-- Heading for the blog posts list -->
    <h1>Blog Posts</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
    
    <!-- Link to create a new post -->
    <a href="{{ route('author.posts.create') }}" class="btn btn-primary">Create Post</a>
    
    <!-- List of blog posts -->
    <ul>
        @foreach ($posts as $post)
            <li>
                <!-- Link to view the individual post -->
                <a href="{{ route('author.posts.show', $post->id) }}">{{ $post->title }}</a>
                
                <!-- Link to edit the post -->
                <a href="{{ route('author.posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                
                <!-- Form to delete the post -->
                <form action="{{ route('author.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <!-- Delete button with confirmation prompt -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>
            </li>
        @endforeach      
    </ul>
@endsection

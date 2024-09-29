@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <!-- Heading for editing the post -->
    <h1>Edit Post</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
    
    <!-- Form for updating the blog post -->
    <form action="{{ route('author.posts.update', $post->id) }}" method="POST">
        @csrf <!-- CSRF token for security -->
        @method('PUT') <!-- Method spoofing to use PUT request -->
        
        <div class="form-group">
            <!-- Input field for the post title -->
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}">
            <!-- Display validation error for title -->
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <!-- Textarea for the post content -->
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control">{{ old('content', $post->content) }}</textarea>
            <!-- Display validation error for content -->
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Button to submit the form and update the post -->
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection

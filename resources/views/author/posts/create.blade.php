@extends('layouts.admin_layout')

@section('content')
    <!-- Section for creating a new blog post -->
    <h1>Blog Post Create</h1>
    <!-- Link to go back to the previous page -->
    <a href="{{ url()->previous() }}">Back</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

    <!-- Form for submitting a new blog post -->
    <form action="{{ route('author.posts.store') }}" method="POST">
        @csrf <!-- CSRF token for security -->
        <div class="form-group">
            <!-- Input field for the post title -->
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            <!-- Display validation error for title -->
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <!-- Textarea for the post content -->
            <label for="content">Content</label>
            <textarea name="content" class="form-control" required>{{ old('content') }}</textarea>
            <!-- Display validation error for content -->
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Submit button for the form -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

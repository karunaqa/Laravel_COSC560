@extends('layouts.admin_layout')

@section('content')
    <!-- Heading for the blog post details -->
    <h1>Blog Post Details</h1>
    
    <!-- Link to go back to the previous page -->
    <a href="{{ url()->previous() }}">Back</a>
    
    <!-- List displaying details of the blog post -->
    <ul>
        <li>ID: {{ $post->id }}</li> 
        <li>Title: {{ $post->title }}</li>  
        <li>Content: {{ $post->content }}</li>       
    </ul>
    
@endsection

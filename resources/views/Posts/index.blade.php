@extends('layouts.admin_layout')

@section('content')


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Blog Posts</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-outline-secondary">Create Post</a>
            </div>
            </div>
        </div>


    <style>
        /* Add custom styles for the table and action buttons here */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .action-buttons a {
            margin-right: 5px;
        }
    </style>

    <div class="container">

        
        <!-- Table displaying the list of blog posts -->
        <table>
            <thead>
                <tr>
                    <!-- Table headers -->
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <!-- Display post title -->
                        <td>{{ $post->title }}</td>
                        <!-- Display post content -->
                        <td>{{ $post->content }}</td>
                        <td>
                            <div class="action-buttons">
                                <!-- Link to view the individual post -->
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Show</a>
                                <!-- Link to edit the post -->
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                                
                                <!-- Form to delete the post -->
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Delete button -->
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

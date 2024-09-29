@extends('layouts.admin_layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">User Details</h1>
    
    <div class="mb-3">
        <strong>Name:</strong> {{ $user->name }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $user->email }}
    </div>
    <div class="mb-3">
        <strong>Role:</strong> {{ ucfirst($user->role) }}
    </div>

    <a href="{{ route('author.posts.edit', $user->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('author.posts.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
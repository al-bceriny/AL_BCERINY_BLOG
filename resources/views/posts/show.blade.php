@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">
        Category: {{ $post->category?->name }} |
        Created at: {{ $post->created_at->format('Y-m-d H:i') }}
    </p>

    <hr>

    <p>{{ $post->body }}</p>


<hr>

<h3>Comments</h3>

@if($post->comments->count())
    @foreach($post->comments as $comment)
        <div class="border p-2 mb-2">
            <strong>{{ $comment->name }}</strong>
            <p class="mb-1">{{ $comment->content }}</p>
            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
        </div>
    @endforeach
@else
    <p>No comments yet.</p>
@endif

<hr>

<h4>Add Comment</h4>

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form action="{{ route('comments.store') }}" method="POST">
    @csrf

    <input type="hidden" name="post_id" value="{{ $post->id }}">

    <div class="mb-3">
        <label>Name</label>
        <input name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email (optional)</label>
        <input name="email" class="form-control">
    </div>

    <div class="mb-3">
        <label>Comment</label>
        <textarea name="content" class="form-control" rows="4" required></textarea>
    </div>

    <button class="btn btn-primary">Submit</button>
</form>
@endsection

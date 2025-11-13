@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    </div>

    @if($posts->count())
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Created at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        <a href="{{ route('posts.show', $post) }}">
                            {{ $post->title }}
                        </a>
                    </td>
                    <td>{{ $post->category?->name }}</td>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    <td class="text-end">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    @else
        <p>No posts yet.</p>
    @endif
@endsection

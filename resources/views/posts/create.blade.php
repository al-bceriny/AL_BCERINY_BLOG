@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text"
                   name="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id"
                    class="form-select @error('category_id') is-invalid @enderror">
                <option value="">-- Choose Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body"
                      rows="6"
                      class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
@endsection

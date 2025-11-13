@extends('layouts.app')

@section('content')
<h1>Edit Category</h1>

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" value="{{ $category->name }}">
        @error('name') <p class="text-danger small">{{ $message }}</p> @enderror
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection

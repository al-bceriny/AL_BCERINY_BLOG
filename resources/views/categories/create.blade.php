@extends('layouts.app')

@section('content')
<h1>Add Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" value="{{ old('name') }}">
        @error('name') <p class="text-danger small">{{ $message }}</p> @enderror
    </div>

    <button class="btn btn-primary">Save</button>
</form>
@endsection

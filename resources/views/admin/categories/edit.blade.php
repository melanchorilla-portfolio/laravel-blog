@extends('layouts.main')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? '' }}</h1>
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Category name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $category->name }}">
                @error('name')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
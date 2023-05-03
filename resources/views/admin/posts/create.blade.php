@extends('layouts.main')

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2multiple').select2();
        $('.select2single').select2();
    });
</script>
@endpush

@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? '' }}</h1>
<div class="row mb-3">
        <div class="col-md-10">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title for post" value="{{ old('title') }}">
                    @error('title')
                        <span class="mt-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Upload an image</label>
                    <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" id="image">
                    @error('image')
                        <span class="mt-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select class="form-control select2multiple @error('tags') is-invalid @enderror" id="tags" name="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option {{ $post->tags()->find($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <span class="mt-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control @error('category') is-invalid @enderror select2single" id="category" name="category">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="mt-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="post">Post</label>
                    <input type="hidden" name="post" id="post" value="{{ old('post') }}">
                    <trix-editor input="post"></trix-editor>
                    @error('post')
                        <span class="mt-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
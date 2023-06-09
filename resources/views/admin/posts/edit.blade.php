@extends('layouts.main')

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2multiple').select2();
        $('.select2single').select2();
    });

    const title = document.querySelector("#title");
    const slug = document.querySelector("#slug");

    title.addEventListener('change', function() {
        fetch('/admin/posts/check-slug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endpush

@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? '' }}</h1>

<div class="row">
    <div class="col-md-10">
        <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title for post" value="{{ old('title') ?? $post->title }}">
                @error('title')
                <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') ?? $post->slug }}">
                @error('slug')
                <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- jika ada gambar --}}
            @if($post->image)
            <div class="row">
                <div class="col-md-6">
                    <div style="max-height: 350px; overflow: hidden;">
                        <img src="{{ asset('storage/uploads/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>
                </div>
            </div>
            @endif
            {{-- end jika ada gambar --}}
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
                    <option {{ $post->category->id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="post">Post</label>
                <input type="hidden" name="post" id="post" value="{{ old('post') ?? $post->post }}">
                <trix-editor input="post"></trix-editor>
                @error('post')
                <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection
@extends('layouts.main')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? '' }}</h1>
<div class="row mt-3 mb-5">
    <div class="col-md-12">
        <p>By: {{ $post->user->name }} | Category: {{ $post->category->name }}</p>
        
        @if($post->image)
            <div style="max-height: 400px; overflow: hidden;" class="text-center">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
            </div>
        @else
            <img src="https://dummyimage.com/1200x400/dee2e6/6c757d.jpg" alt="{{ $post->category->name }}" class="img-fluid">
        @endif

        <article class="my-3 fs-5">

            {!! $post->post !!}

        </article>

        <div class="mt-4">
            <p>Tags: 
                @foreach($post->tags as $index => $tag)
                    @if($index %2 == 0)
                        <p class="btn btn-outline-primary btn-sm">{{ $tag->name }}</p>
                    @else
                        <p class="btn btn-outline-success btn-sm">{{ $tag->name }}</p>
                    @endif
                @endforeach
            </p>
        </div>

        
        <a href="{{ route('posts.index') }}" class="d-block mt-5">Back to Posts</a>
    </div>
</div>

@endsection
@extends('layouts.main')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? '' }}</h1>

<div class="row">
    <div class="col-md-12">
        @foreach($posts as $post)
            @if($post->image)
            <div style="max-height: 400px; overflow: hidden;" class="text-center">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
            </div>
            @else
                <img src="https://dummyimage.com/1200x400/dee2e6/6c757d.jpg" alt="{{ $post->category->name }}" class="img-fluid">
            @endif

            <h4 class="mt-2">
                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
            </h4>

            <p>
                By: {{ $post->user->name }} | 
                Category: {{ $post->category->name }} |
                Tags: 
                @foreach($post->tags as $tag)
                    {{ $tag->name }}
                @endforeach
            </p>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.blog')
@section('content')
<section class="my-5">
    <div class="container">
        <article class="row">
            <div class="col-md-12">
                <h1 class="h2 mb-3">{{ $post->title }}</h1>
                <ul class="list-inline post-meta mb-3">
                    <li class="list-inline-item"><i class="far fa-user"></i> <a href="{{ route('posts', 'author=') . $post->user->name }}">{{ $post->user->name }}</a>
                    </li>
                    <li class="list-inline-item">Date : {{ $post->created_at->diffForHumans() }}</li>
                    <li class="list-inline-item">Categories : <a href="{{ route('posts', 'category=') . $post->category->slug }}" class="ml-1">{{ $post->category->name }}</a>
                    </li>
                    <li class="list-inline-item">Tags : 
                        @foreach($post->tags as $tag)
                            <a href="{{ route('posts', 'tag=') . $tag->slug }}" class="ml-1">{{ $tag->name }}</a>
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="col-md-12 mb-3">
                @if($post->image)
                    <div class="post-slider" class="text-center">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>
                @else
                    <div class="post-slider">
                        <img src="https://dummyimage.com/1200x400/dee2e6/6c757d.jpg" class="img-fluid" alt="{{ $post->category->name }}">
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="content">
                    {!! $post->post !!}
                </div>
            </div>
        </article>
    </div>
</section>
@endsection
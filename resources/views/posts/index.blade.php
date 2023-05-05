@extends('layouts.blog')
@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                @foreach($posts as $post)
                <article class="row mb-5">
                    <div class="col-12">
                        <div class="post-slider">
                            @if($post->image)
                            <img
                                src="/storage/uploads/{{ $post->image }}"
                                class="img-fluid"
                                alt="{{ $post->title }}"
                            />
                            @else
                            <img
                                src="/images/post/post-6.jpg"
                                class="img-fluid"
                                alt="post-thumb"
                            />
                            @endif
                        </div>
                    </div>
                    <div class="col-12 mx-auto">
                        <h3>
                            <a class="post-title" href="/post/{{ $post->slug }}"
                            >
                            {{ $post->title }}
                            </a>
                        </h3>
                        <ul class="list-inline post-meta mb-4">
                            <li class="list-inline-item">
                                <i class="far fa-user mr-2"></i>
                                <a href="#">{{ $post->user->name }}</a>
                            </li>
                            <li class="list-inline-item">Date : {{ $post->created_at->diffForHumans() }}</li>
                            <li class="list-inline-item">
                                Categories : <a href="#!" class="ml-1">{{ $post->category->name }} </a>
                            </li>
                            <li class="list-inline-item">
                                Tags : 
                                    @foreach($post->tags as $tag)
                                        <a href="#!" class="ml-1">{{ $tag->name }} </a>
                                    @endforeach
                            </li>
                        </ul>
                        {!! Str::limit($post->post, 200) !!}
    
                        <a href="/post/{{ $post->slug }}" class="btn btn-outline-primary mt-3"
                            >Continue Reading</a>
                    </div>
                </article>
                @endforeach
            </div>
            <aside class="col-lg-4">
            <!-- Search -->
            <div class="widget">
                <h5 class="widget-title"><span>Search</span></h5>
                <form action="/logbook-hugo/search" class="widget-search">
                <input
                    id="search-query"
                    name="s"
                    type="search"
                    placeholder="Type &amp; Hit Enter..."
                />
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </form>
            </div>
            <!-- categories -->
            <div class="widget">
                <h5 class="widget-title"><span>Categories</span></h5>
                <ul class="list-unstyled widget-list">
                @foreach($categories as $category)
                    <li>
                        <a href="#!"
                        >{{ $category->name }}</a
                        >
                    </li>
                @endforeach
                </ul>
            </div>
            <!-- tags -->
            <div class="widget">
                <h5 class="widget-title"><span>Tags</span></h5>
                <ul class="list-inline widget-list-inline">
                    @foreach($tags as $tag)
                        <li class="list-inline-item"><a href="#!">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- latest post -->
            <div class="widget">
                <h5 class="widget-title"><span>Latest Article</span></h5>
                <!-- post-item -->
                @foreach($posts as $latest_post)
                <ul class="list-unstyled widget-list">
                    <li class="media widget-post align-items-center">
                        <a href="/post/{{ $latest_post->slug }}">
                            <img
                                loading="lazy"
                                class="mr-3"
                                src="/images/post/post-6.jpg"
                            />
                        </a>
                        <div class="media-body">
                            <h5 class="h6 mb-0">
                                <a href="/post/{{ $latest_post->slug }}">{{ $post->title }}</a>
                            </h5>
                            <small>{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </li>
                </ul>
                    @break($loop->iteration == 3)
                @endforeach
            </div>
            </aside>
        </div>
    </div>
</section>

@endsection
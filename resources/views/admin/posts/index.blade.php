@extends('layouts.main')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? '' }}</h1>
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create post</a>
        <form action="{{ route('posts.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter search term.." value="{{ request('search') }}" name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <a href="{{ route('posts.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/uploads/' . $post->image) }}" alt="" width="200">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form method="POST" class="d-inline" action="{{ route('posts.destroy', $post->slug) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="row">
    <div>
        {{ $posts->links() }}
    </div>
</div>
@endsection
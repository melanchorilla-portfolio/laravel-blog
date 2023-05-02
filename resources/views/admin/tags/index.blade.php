@extends('layouts.main')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? '' }}</h1>
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Create tag</a>
        <form action="{{ route('tags.index') }}" method="GET">
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
    <div class="col-md-8">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" class="d-inline" action="{{ route('tags.destroy', $tag->id) }}">
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
<div class="row">
    <div>
        {{ $tags->links() }}
    </div>
</div>
@endsection
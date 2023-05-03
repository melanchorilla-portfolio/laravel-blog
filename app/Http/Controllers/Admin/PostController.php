<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\{Post, Category, Tag};
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $title = "Posts";
        $posts = Post::with('category', 'tags')->latest()->paginate(10)->withQueryString();
        if ($request->has('search')) {
            $posts = Post::where('title', 'like', "%{$request->search}%")->paginate(10)->withQueryString();
        }
        
        return view('admin.posts.index', compact('title', 'posts'));
    }

    public function create()
    {
        $title = "Create Posts";
        $categories = Category::get();
        $tags = Tag::get();
        $post = new Post;

        return view('admin.posts.create', compact('title', 'categories', 'tags', 'post'));
    }

    public function store(PostRequest $request)
    {
        if ($request->has('image')) {
            $image = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $image, 'public'); 
        }

        $post = Post::create([
            'title' => $request->title,
            'post' => $request->post,
            'slug' => Str::slug($request->title),
            'image' => $image ?? null,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
        ]);
        
        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index')->with('message', 'Post created successfully');
    }

    public function show(Post $post)
    {
        $title = $post->title;

        return view('admin.posts.show', compact('title', 'post'));
    }

    public function edit(Post $post)
    {
        $title = "Edit Posts";
        $categories = Category::get();
        $tags = Tag::get();

        return view('admin.posts.edit', compact('title', 'categories', 'tags', 'post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        if ($request->has('image')) {
            Storage::delete('public/uploads/' . $post->image);
            
            $image = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $image, 'public');
        }

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'post' => $request->post,
            'image' => $filename ?? $post->image,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category
        ]);

        $post->tags()->sync(request('tags'));

        return redirect()->route('posts.index')->with('message', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete('public/uploads/' . $post->image);
        }
        
        $post->tags()->detach();
        $post->delete();
        
        return redirect()->route('posts.index')->with('message', 'Post deleted successfully');
    }
}

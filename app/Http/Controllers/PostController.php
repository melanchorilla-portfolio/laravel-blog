<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
        }

        if (request('tags')) {
            $tag = Tag::firstWhere('slug', request('tag'));
        }

        if (request('author')) {
            $author = User::firstWhere('name', request('author'));
        }

        $posts = Post::with('category', 'tags', 'user')->latest()->filter(request(['search', 'category', 'author', 'tag']))->paginate(5)->withQueryString();

        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.index', compact('posts', 'categories', 'tags'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}

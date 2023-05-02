<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $title = "Tags";
        $tags = Tag::latest()->paginate(10)->withQueryString();
        if ($request->has('search')) {
            $tags = Tag::where('name', 'like', "%{$request->search}%")->paginate(10)->withQueryString();
        }

        return view('admin.tags.index', compact('title', 'tags'));
    }

    public function create()
    {
        $title = "Create Tag";

        return view('admin.tags.create', compact('title'));
    }

    public function store(TagRequest $request)
    {
        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
        ]);

        return redirect()->route('tags.index')->with('message', 'Tag created successfully');

    }

    public function show($id)
    {
        //
    }

    public function edit(Tag $tag)
    {
        $title = "Edit Tag";

        return view('admin.tags.edit', compact('title', 'tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
            'slug' => Str::slug(request('name')),
        ]);

        return redirect()->route('tags.index')->with('message', 'Tag updated successfully');

    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('message', 'Tag deleted successfully');
    }
}

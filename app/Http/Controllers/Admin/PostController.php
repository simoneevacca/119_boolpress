<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderByDesc('id')->paginate(8);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();

        if($request->has('image')) {
            $image_path = Storage::put('uploads', $validated['image']);
            $validated['image'] = $image_path;
        }

        $slug = Str::slug($request->title, '-');
        $validated['slug'] = $slug;
        // dd($validated);

        Post::create($validated);
        return to_route('admin.posts.index')->with('message', 'Post create succesfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $slug = Str::slug($request->title, '-');
        $validated['slug'] = $slug;

        if($request->has('image')) {
            if($post->image) {
                Storage::delete($post->image);
            }
            $image_path = Storage::put('uploads', $validated['image']);
            $validated['image'] = $image_path;
        }

        $post->update($validated);
        return to_route('admin.posts.index')->with('message', "Post: $post->title has been updated");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }

        $post->delete();
        return to_route('admin.posts.index')->with('message', "Post: $post->title deleted with success");
    }
}

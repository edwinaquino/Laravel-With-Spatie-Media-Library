<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request) {
        $validated = $request->validated();
        $post = Post::create($validated);
        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')
                ->withResponsiveImages()
                ->toMediaCollection('images');
        }
        if ($request->hasFile('download')) {
            $post->addMediaFromRequest('download')
                ->withResponsiveImages()
                ->toMediaCollection('downloads');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostCreateRequest $request, Post $post) {
        // UPDATE DATABASE
        $validated = $request->validated();
        $post->update($validated);
        if ($request->hasFile('image')) {

            // delete the previous image
            //$post->clearMediaCollection('images');
            // UPDATE the new image
            $post->addMediaFromRequest('image')
                ->withResponsiveImages()
                ->toMediaCollection('images');
        }
        if ($request->hasFile('download')) {

            // delete the previous image
            //$post->clearMediaCollection('downloads');
            // UPDATE the new image
            $post->addMediaFromRequest('download')
                ->withResponsiveImages()
                ->toMediaCollection('downloads');
        }



        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return to_route('posts.index');
    }
    /*
    // ANOTHER WAY TO DELETE
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
    */

    public function download($id) {
        $post = Post::findOrFail($id);
        $media = $post->getFirstMedia('downloads');
        return $media;
    }
    public function downloads() {

        $media = Media::where('collection_name','downloads')->get();

        return MediaStream::create('donwloads.zip')->addMedia($media);
    }
    public function downloadsall() {
        return MediaStream::create('donwloads.zip')->addMedia(Media::all());
    }

    public function resImage($id) {
        //return $id;
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}

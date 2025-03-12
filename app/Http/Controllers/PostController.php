<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostFormRequest;
use App\Models\Post;
use Exception;
use Illuminate\Contracts\Cache\Factory as Cache;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Using Contracts instead Facades
    public function __construct(public Cache $cache)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $title = 'All posts';

        $posts = $this->cache->rememberForever('posts', function (){
            return Post::with('user')
                ->select('id', 'title', 'user_id', 'content', 'created_at', 'updated_at', 'fresh')
                ->where('active', '=', 1)
                ->orderByDesc('id')
                ->get();
        });

        return view('admin.posts.index', compact('title', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
//        Gate::authorize('create-post');
//        if (Gate::denies('create-post')){
//            abort(403);
//        }

        if (request()->user()->cannot('create', Post::class)){
            abort(403);
        }

        $title = 'Add post';

        return view('admin.posts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
//        if (Gate::denies('create-post')){
//            abort(403);
//        }

        Gate::authorize('create', Post::class);

        $validated = $request->validated();

        $post = Post::query()->create($validated);

        PostCreated::dispatch($post->id);

        $this->cache->flush();

        return to_route('admin.posts')->with('success', 'Пост успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
//        if (!Gate::allows('update-post', $post)){
//            abort(403);
//        }

        Gate::authorize('update', $post);

        $title = 'Изменить пост';

        return view('admin.posts.edit', compact('title', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostFormRequest $request, Post $post): RedirectResponse
    {
//        if (!Gate::allows('update-post', $post)){
//            abort(403);
//        }

        $post->update($request->validated());

        $this->cache->flush();

        return to_route('admin.posts')->with('success', 'Пост успешно изменён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        if (Gate::denies('delete', $post)){
            abort(403);
        }

        $post->delete();

        $this->cache->flush();

        return to_route('admin.posts')->with('success', 'Пост успешно удалён');
    }
}

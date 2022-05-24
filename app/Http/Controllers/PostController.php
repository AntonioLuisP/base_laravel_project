<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    const ITEM = 'post';
    const ITEMS_PER_SEARCH = 25;
    protected $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(Request $request)
    {
        $posts = $this->repository->bigSearch($request->all())->paginate($this::ITEMS_PER_SEARCH);
        $links = $posts->appends($request->except('page'));
        return view($this::ITEM . '.index', ['posts' => $posts, 'links' => $links]);
    }

    public function show(Post $post)
    {
        return view($this::ITEM . '.show', compact('post'));
    }

    public function create()
    {
        return view($this::ITEM . '.create');
    }

    public function store(PostRequest $request)
    {
        dd($request);
        $post = $this->repository->create($request->all());
        return redirect()->route($this::ITEM . '.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view($this::ITEM . '.edit', compact('post'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $this->repository->update($request->all(), $post->id);
        return redirect()->route($this::ITEM . '.show', ['post' => $post]);
    }

    public function destroy(Post $post, Request $request)
    {
        $this->authorize('delete', $post);
        $this->repository->delete($post);
        return redirect()->route('home');
    }

    // public function deleted(Request $request)
    // {
    //     $this->authorize('view-any', Post::class);
    //     $posts = $this->repository->bigSearch($request->all() + ['deleted_at' => null]);
    //     $links = $posts->appends($request->except('page'));
    //     return view($this::ROUTE_VIEW . '.deleted', compact('posts', 'links'));
    // }

    // public function restore($post, Request $request)
    // {
    //     $this->authorize('restore', Post::class);
    //     $this->repository->restore($post);
    //     return redirect()->route($this::ROUTE_VIEW . '.show', ['post' => $especie]);
    // }
}

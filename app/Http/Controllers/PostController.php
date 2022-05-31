<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Repositories\PostThemeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    const ITEM = 'post';
    const ITEMS_PER_SEARCH = 25;

    protected $repository;
    protected $postThemeRepository;

    public function __construct(
        PostRepository $repository,
        PostThemeRepository $postThemeRepository
    ) {
        $this->repository = $repository;
        $this->postThemeRepository = $postThemeRepository;
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
        $themes = $this->postThemeRepository->all();
        return view($this::ITEM . '.create', compact("themes"));
    }

    public function store(PostRequest $request)
    {
        $post = $this->repository->create($request->validated() + ['id_user' => Auth::user()->id]);
        return redirect()->route($this::ITEM . '.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $themes = $this->postThemeRepository->all();
        return view($this::ITEM . '.edit', compact('post', 'themes'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $this->repository->update($request->all(), $post->id);
        return redirect()->route($this::ITEM . '.show', ['post' => $post]);
    }

    public function destroy(Post $post, Request $request)
    {
        $this->repository->delete($post->id);
        return redirect()->route($this::ITEM . '.index');
    }

    public function deleted(Request $request)
    {
        $this->authorize('restore', Post::class);
        $posts = $this->repository->bigDeletedSearch($request->all())->paginate($this::ITEMS_PER_SEARCH);
        $links = $posts->appends($request->except('page'));
        return view($this::ITEM . '.deleted', compact('posts', 'links'));
    }

    public function restore($post, Request $request)
    {
        $this->authorize('restore', Post::class);
        $this->repository->restore($post);
        return redirect()->route($this::ITEM . '.show', ['post' => $post]);
    }
}

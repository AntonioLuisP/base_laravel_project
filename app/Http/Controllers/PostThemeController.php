<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostThemeRequest;
use App\Models\PostTheme;
use App\Repositories\PostThemeRepository;
use Illuminate\Http\Request;

class PostThemeController extends Controller
{
    const ITEM = 'post_theme';
    const ITEMS_PER_SEARCH = 25;
    protected $repository;

    public function __construct(PostThemeRepository $repository)
    {
        $this->repository = $repository;
        $this->authorizeResource(PostTheme::class, 'post_theme');
    }

    public function index(Request $request)
    {
        $post_themes = $this->repository->bigSearch($request->all(), false)->paginate(is_int($request->quantidade) ? $request->quantidade : $this::ITEMS_PER_SEARCH);
        $links = $post_themes->appends($request->except('page'));
        return view($this::ITEM . '.index', ['post_themes' => $post_themes, 'links' => $links]);
    }

    public function create()
    {
        return view($this::ITEM . '.create');
    }

    public function store(PostThemeRequest $request)
    {
        $post_theme = $this->repository->create($request->validated());
        return redirect()->route($this::ITEM . '.index');
    }

    public function edit(PostTheme $post_theme)
    {
        return view($this::ITEM . '.edit', compact('post_theme'));
    }

    public function update(PostTheme $post_theme, PostThemeRequest $request)
    {
        $this->repository->update($request->validated(), $post_theme->id);
        return redirect()->route($this::ITEM . '.index');
    }

    public function destroy(PostTheme $post_theme, Request $request)
    {
        $this->repository->delete($post_theme->id);
        return redirect()->route('home');
    }

    public function deleted(Request $request)
    {
        $this->authorize('restore', PostTheme::class);
        $post_themes = $this->repository->bigSearch($request->all(), true)->paginate(is_int($request->quantidade) ? $request->quantidade : $this::ITEMS_PER_SEARCH);
        $links = $post_themes->appends($request->except('page'));
        return view($this::ITEM . '.deleted', compact('post_themes', 'links'));
    }

    public function restore($post_theme, Request $request)
    {
        $this->authorize('restore', PostTheme::class);
        $this->repository->restore($post_theme);
        return redirect()->route($this::ITEM . '.index');
    }
}

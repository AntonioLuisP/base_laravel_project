<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostThemeRequest;
use App\Models\PostTheme;
use App\Repositories\PostThemeRepository;

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
        $post_themes = $this->repository->bigSearch($request->all())->paginate($this::ITEMS_PER_SEARCH);
        $links = $post_themes->appends($request->except('page'));
        return view($this::ITEM . '.index', ['post_themes' => $post_themes, 'links' => $links]);
    }

    public function create()
    {
        return view($this::ITEM . '.create');
    }

    public function store(PostThemeRequest $request)
    {
        $post_theme = $this->repository->create($request->all());
        return redirect()->route($this::ITEM . '.index');
    }

    public function edit(PostTheme $post_theme)
    {
        return view($this::ITEM . '.edit', compact('post_theme'));
    }

    public function update(PostTheme $post_theme, PostThemeRequest $request)
    {
        $this->repository->update($request->all(), $post_theme->id);
        return redirect()->route($this::ITEM . '.show', ['post_theme' => $post_theme]);
    }

    public function destroy(PostTheme $post_theme, Request $request)
    {
        $this->authorize('delete', $post_theme);
        $this->repository->delete($post_theme);
        return redirect()->route('home');
    }

    // public function deleted(Request $request)
    // {
    //     $this->authorize('view-any', PostTheme::class);
    //     $post_themes = $this->repository->bigSearch($request->all() + ['deleted_at' => null]);
    //     $links = $post_themes->appends($request->except('page'));
    //     return view($this::ROUTE_VIEW . '.deleted', compact('post_themes', 'links'));
    // }

    // public function restore($post_theme, Request $request)
    // {
    //     $this->authorize('restore', PostTheme::class);
    //     $this->repository->restore($post_theme);
    //     return redirect()->route($this::ROUTE_VIEW . '.show', ['post_theme' => $post_theme]);
    // }
}

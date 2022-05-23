<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostTypeRequest;
use App\Models\PostType;
use App\Repositories\PostRepository;

class PostTypeController extends Controller
{
    const ITEM = 'post_type';
    const ITEMS_PER_SEARCH = 25;
    protected $repository;

    public function __construct(PostTypeRepository $repository)
    {
        $this->repository = $repository;
        $this->authorizeResource(PostType::class, 'post_type');
    }

    public function index(Request $request)
    {
        $post_types = $this->repository->bigSearch($request->all())->paginate($this::ITEMS_PER_SEARCH);
        $links = $post_types->appends($request->except('page'));
        return view($this::ITEM . '.index', ['post_types' => $post_types, 'links' => $links]);
    }

    public function show(PostType $post_type)
    {
        return view($this::ITEM . '.show', compact('post_type'));
    }

    public function create()
    {
        return view($this::ITEM . '.create');
    }

    public function store(PostTypeRequest $request)
    {
        $post_type = $this->repository->create($request->all());
        return redirect()->route($this::ITEM . '.show', ['post_type' => $post_type]);
    }

    public function edit(PostType $post_type)
    {
        return view($this::ITEM . '.edit', compact('post_type'));
    }

    public function update(PostType $post_type, PostTypeRequest $request)
    {
        $this->repository->update($request->all(), $post_type->id);
        return redirect()->route($this::ITEM . '.show', ['post_type' => $post_type]);
    }

    public function destroy(PostType $post_type, Request $request)
    {
        $this->authorize('delete', $post_type);
        $this->repository->delete($post_type);
        return redirect()->route('home');
    }

    public function deleted(Request $request)
    {
        $this->authorize('view-any', PostType::class);
        $post_types = $this->repository->bigSearch($request->all() + ['deleted_at' => null]);
        $links = $post_types->appends($request->except('page'));
        return view($this::ROUTE_VIEW . '.deleted', compact('post_types', 'links'));
    }

    public function restore($post_type, Request $request)
    {
        $this->authorize('restore', PostType::class);
        $this->repository->restore($post_type);
        return redirect()->route($this::ROUTE_VIEW . '.show', ['post_type' => $especie]);
    }
}

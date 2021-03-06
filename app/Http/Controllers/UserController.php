<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    const ITEM = 'user';
    const ITEMS_PER_SEARCH = 25;

    protected $repository;
    protected $postRepository;

    public function __construct(
        UserRepository $repository,
        PostRepository $postRepository
    ) {
        $this->repository = $repository;
        $this->postRepository = $postRepository;
        $this->authorizeResource(User::class, 'user');
    }

    public function index(Request $request)
    {
        $users = $this->repository->bigSearch($request->all(), false)->paginate(is_int($request->quantidade) ? $request->quantidade : $this::ITEMS_PER_SEARCH);
        $links = $users->appends($request->except('page'));
        return view($this::ITEM . '.index', compact('users', 'links'));
    }

    public function show(User $user, Request $request)
    {
        $permissions = Permission::select('name', 'id')->orderBy('name', 'asc')->get();
        $posts = $this->postRepository->bigSearch($request->all() + ['id_user' => $user->id])->paginate(is_int($request->quantidade) ? $request->quantidade : $this::ITEMS_PER_SEARCH);
        $links = $posts->appends($request->except('page'));
        return view($this::ITEM . '.show', compact('user', 'posts', 'links', 'permissions'));
    }

    public function create()
    {
        return view($this::ITEM . '.create');
    }

    public function store(UserRequest $request)
    {
        $user = $this->repository->create($request->validated());
        return redirect()->route($this::ITEM . '.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view($this::ITEM . '.edit', ['user' => $user]);
    }

    public function update(User $user, UserRequest $request)
    {
        $this->repository->update($request->validated(), $user->id);
        return redirect()->back()->with(['success' => "Alterado com sucesso"]);
    }

    public function passwordUpdate(User $user, PasswordRequest $request)
    {
        $this->authorize('update', $user);
        $this->repository->password($request->password);
        return redirect()->back()->with(['success' => "Alterado com sucesso"]);
    }

    public function permissionUpdate(User $user, Request $request)
    {
        //colocar as autorizations
        $validated = $request->validate([
            'permissions' => ['required', 'array', 'exists:permissions,id'],
        ]);

        $user->syncPermissions($validated['permissions']);
        return redirect()->route($this::ITEM . '.show', ['user' => $user]);
    }

    public function destroy(User $user, Request $request)
    {
        $this->repository->delete($user->id);
        if (auth()->id() === $user->id) {
            auth()->logout();
        }
        return redirect()->route($this::ITEM . '.index');
    }

    public function deleted(Request $request)
    {
        $this->authorize('restore', User::class);
        $users = $this->repository->bigSearch($request->all(), true)->paginate(is_int($request->quantidade) ? $request->quantidade : $this::ITEMS_PER_SEARCH);
        $links = $users->appends($request->except('page'));
        return view($this::ITEM . '.deleted', compact('users', 'links'));
    }

    public function restore($user, Request $request)
    {
        $this->authorize('restore', User::class);
        $user = $this->repository->restore($user);
        return redirect()->route($this::ITEM . '.show', ['user' => $user]);
    }
}

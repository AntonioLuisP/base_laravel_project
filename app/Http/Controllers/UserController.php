<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

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
        $users = $this->repository->bigSearch($request->all())->paginate($this::ITEMS_PER_SEARCH);
        $links = $users->appends($request->except('page'));
        return view($this::ITEM . '.index', compact('users', 'links'));
    }

    public function show(User $user, Request $request)
    {
        $posts = $this->postRepository->bigSearch($request->all() + ['id_user', '=', $user->id])->paginate($this::ITEMS_PER_SEARCH);
        return view($this::ITEM . '.show', compact('user', 'posts'));
    }

    public function edit(User $user)
    {
        return view($this::ITEM . '.edit', ['user' => $user]);
    }

    public function update(User $user, UserRequest $request)
    {
        $this->repository->update($request->all(), $user->id, 'id');
        return redirect()->back()->with(['success' => "Alterado com sucesso"]);
    }

    public function destroy(User $user, Request $request)
    {
        $this->authorize('delete', $user);
        $this->repository->delete($user);
        return redirect()->route('home');
    }

    // public function deleted(Request $request)
    // {
    //     $this->authorize('view-any', User::class);
    //     $users = $this->repository->bigSearch($request->all() + ['deleted_at' => null]);
    //     $links = $users->appends($request->except('page'));
    //     return view($this::ITEM . '.deleted', compact('users', 'links'));
    // }

    // public function restore($user, Request $request)
    // {
    //     $this->authorize('restore', User::class);
    //     $this->repository->restore($user);
    //     return redirect()->route($this::ITEM . '.show', ['user' => $user]);
    // }

    public function passwordUpdate(User $user, PasswordRequest $request)
    {
        $this->authorize('update', $user);
        $this->repository->password($request->password);
        return redirect()->back()->with(['success' => "Alterado com sucesso"]);
    }
}

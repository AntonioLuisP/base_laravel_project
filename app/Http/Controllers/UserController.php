<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const ROUTE_VIEW = 'user';
    const ITEMS_PER_SEARCH = 25;

    public function __construct(
        UserRepository $repository
    ) {
        $this->repository = $repository;
        $this->authorizeResource(User::class, 'user');
    }

    public function index(Request $request)
    {
        $users = $this->repository->bigSearch($request->all())->paginate($this::ITEMS_PER_SEARCH);
        $links = $users->appends($request->except('page'));
        return view($this::ROUTE_VIEW . '.index', compact('users', 'links'));
    }

    public function show(User $user, Request $request)
    {
        return view($this::ROUTE_VIEW . '.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view($this::ROUTE_VIEW . '.edit', ['user' => $user]);
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
    //     return view($this::ROUTE_VIEW . '.deleted', compact('users', 'links'));
    // }

    // public function restore($user, Request $request)
    // {
    //     $this->authorize('restore', User::class);
    //     $this->repository->restore($user);
    //     return redirect()->route($this::ROUTE_VIEW . '.show', ['user' => $especie]);
    // }

    public function passwordUpdate(User $user, PasswordRequest $request)
    {
        $this->authorize('update', $user);
        $this->repository->password($request->password);
        return redirect()->back()->with(['success' => "Alterado com sucesso"]);
    }
}

<?php

namespace App\Http\Controllers\NeededControlls;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionUserController extends Controller
{
    protected $repository;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function edit(User $user)
    {
        $userPermissions = $user->getAllPermissions();
        $permissions = Permission::all();
        dd($userPermissions);
        return view('permission.edit', compact('user', 'userPermissions', 'permissions'));
    }

    public function update(User $user, Request $request)
    {
        return redirect()->route('user.index');
    }
}

<?php

namespace App\Http\Controllers\NeededControlls;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    const ITEM = 'permission';
    const ITEMS_PER_SEARCH = 25;

    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function index(Request $request)
    {
        $permissions = $this->permission->select('name', 'id')
            ->orderBy('created_at', 'desc')
            ->get();

        return view($this::ITEM . '.index', compact('permissions'));
    }

    public function show(Permission $permission)
    {
        $users = User::permission($permission->name)->get();
        return view($this::ITEM . '.show', compact('permission', 'users'));
    }
}

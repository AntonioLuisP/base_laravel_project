<?php

namespace App\Http\Controllers\NeededControlls;

use App\Http\Controllers\Controller;
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
        $name = $request->name ?? null;

        $permissions = $this->permission->select('name', 'id')
            ->orderBy('created_at', 'desc');

        $permissions->when($name, function ($query, $name) {
            return $query->where('name', "ilike", "%{$name}%");
        });

        $permissions = $permissions->paginate($this::ITEMS_PER_SEARCH);
        $links = $permissions->appends($request->except('page'));
        return view($this::ITEM . '.index', compact('permissions', 'links'));
    }

    public function create()
    {
        return view($this::ITEM . '.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:permissions|max:255',
        ]);
        $this->permission->create($validated);
        return redirect()->route($this::ITEM . '.index');
    }

    public function edit(Permission $permission)
    {
        return view($this::ITEM . '.edit', compact('permission'));
    }

    public function update(Permission $permission, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:permissions|max:255',
        ]);
        $permission->update($validated);
        return redirect()->route($this::ITEM . '.index');
    }

    public function destroy(Permission $permission, Request $request)
    {
        $permission->delete();
        return redirect()->route($this::ITEM . '.index');
    }
}

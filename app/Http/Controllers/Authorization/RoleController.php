<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    const ITEM = 'role';
    const ITEMS_PER_SEARCH = 25;

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index(Request $request)
    {
        $name = $request->name ?? null;

        $roles = $this->role->select('name', 'id')
            ->orderBy('created_at', 'desc');

        $roles->when($name, function ($query, $name) {
            return $query->where('name', "ilike", "%{$name}%");
        });

        $roles = $roles->paginate($this::ITEMS_PER_SEARCH);
        $links = $roles->appends($request->except('page'));
        return view($this::ITEM . '.index', compact('roles', 'links'));
    }

    public function create()
    {
        return view($this::ITEM . '.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        $this->role->create($validated);
        return redirect()->route($this::ITEM . '.index');
    }

    public function edit(Role $role)
    {
        return view($this::ITEM . '.edit', compact('role'));
    }

    public function update(Role $role, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        $role->update($validated);
        return redirect()->route($this::ITEM . '.index');
    }

    public function destroy(Role $role, Request $request)
    {
        $role->delete();
        return redirect()->route($this::ITEM . '.index');
    }
}

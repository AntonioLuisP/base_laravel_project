<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{

    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $super_admin = Role::create(['name' => config('sistema.roles')[0]]);
        // possui todas as permissões pela regra Gate::before no AuthServiceProvider

        foreach (config('sistema.permissions') as $permissao) {
            $permission = Permission::create(['name' => $permissao]);
            $super_admin->givePermissionTo($permission);
        }

        $user = User::create([
            'name' => 'Antônio',
            'nickname' => 'Lubbuck',
            'email' => 'antonioluisp97@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        $user->assignRole($super_admin);
        $user->syncPermissions(config('sistema.permissions'));
        $user = User::create([
            'name' => 'Teste',
            'nickname' => 'teste',
            'email' => 'teste@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        $user->assignRole($super_admin);
        $user->syncPermissions(config('sistema.permissions'));
    }
}

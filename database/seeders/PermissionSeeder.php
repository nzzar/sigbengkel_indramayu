<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin',
            ],
            ['name' => 'admin']
        );

        $role_owner = Role::updateOrCreate(
            [
                'name' => 'owner',
            ],
            ['name' => 'owner']
        );

        $role_user = Role::updateOrCreate(
            [
                'name' => 'user',
            ],
            ['name' => 'user']
        );

        $permission = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard',
            ],
            ['name' => 'view_dashboard']
        );

        $permission2 = Permission::updateOrCreate(
            [
                'name' => 'view_owner',
            ],
            ['name' => 'view_owner']
        );

        $permission3 = Permission::updateOrCreate(
            [
                'name' => 'view_user',
            ],
            ['name' => 'view_user']
        );

        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_owner->givePermissionTo($permission2);
        $role_user->givePermissionTo($permission3);

        $user = User::find(2);
        $user2 = User::find(9);
        $user3 = User::find(14);

        $user->assignRole(['admin', 'owner']);
        $user2->assignRole(['owner']);
        $user3->assignRole(['user']);
    }
}

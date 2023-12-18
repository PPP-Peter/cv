<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $denied = [''];
        $onlyView = ['view', 'viewAny'];
        $tiny = array_merge($onlyView, ['update']);
        $small = array_merge($tiny, ['create']);
        $medium = array_merge($small, ['delete', 'replicate', 'attach', 'detach']);
        $full = array_merge($medium, ['forceDelete', 'restore']);

        $permissionList = [
            'User' =>       ['super-admin' => $full, 'admin' => $full, 'manager' => $medium, 'user' => $denied],
            'Role' =>       ['super-admin' => $full, 'admin' => $full, 'manager' => $onlyView, 'user' => $onlyView],
            'Permission' => ['super-admin' => $full, 'admin' => $denied, 'manager' => $onlyView, 'user' => $onlyView],
            'Certificate' => ['super-admin' => $full, 'admin' => $full, 'manager' => $medium, 'user' => $tiny],
            'Skill' => ['super-admin' => $full, 'admin' => $full, 'manager' => $medium, 'user' => $tiny],
            'Tool' => ['super-admin' => $full, 'admin' => $full, 'manager' => $medium, 'user' => $tiny],
            'Job' => ['super-admin' => $full, 'admin' => $full, 'manager' => $medium, 'user' => $tiny],
        ];

        $permissions = [
            'view',
            'viewAny',
            'create',
            'update',
            'delete',
            'restore',
            'forceDelete',
            'replicate',
            'attach',
            'detach',
        ];

        foreach ($permissionList as $model => $roles) {
            foreach ($permissions as $permission) {
                $name = "{$permission}{$model}";
                Permission::updateOrCreate(
                    ['name' => $name],
                    ['group' => $model, 'guard_name' => 'web', 'name' => $name]
                );
            }
        }

        foreach ($permissionList as $model => $roles) {
            foreach ($roles as $role => $permissions) {
                $role = Role::updateOrCreate(
                    ['name' => $role],
                    ['name' => $role],
                );
                $permissionNames = [];
                foreach ($permissions as $permission) {
                    $permissionNames[] = "{$permission}{$model}";
                }
                $rolePermissions = Permission::whereIn('name', $permissionNames)->get();
                $role->givePermissionTo($rolePermissions);
            }
        }

    }
}

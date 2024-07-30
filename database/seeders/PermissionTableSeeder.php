<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Admin',
            'User',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $userRole = Role::create(['name' => 'User']);
        $permissions = [
            'User',
        ];
        $permission = Permission::firstOrCreate(['name' => 'User']);
        $userRole->givePermissionTo($permission);
    }
}

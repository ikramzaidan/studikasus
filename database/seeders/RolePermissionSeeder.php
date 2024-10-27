<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create:features']);
        Permission::create(['name' => 'read:features']);
        Permission::create(['name' => 'update:features']);
        Permission::create(['name' => 'delete:features']);
        
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('create:features');
        $roleAdmin->givePermissionTo('read:features');
        $roleAdmin->givePermissionTo('update:features');
        $roleAdmin->givePermissionTo('delete:features');

        $roleUser = Role::create(['name' => 'user']);
        $roleUser->givePermissionTo('read:features');
    }
}

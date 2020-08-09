<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['guard_name' => 'web','name' => 'view']);
        Permission::create(['guard_name' => 'web','name' => 'insert']);
        Permission::create(['guard_name' => 'web','name' => 'edit']);
        Permission::create(['guard_name' => 'web','name' => 'delete']);
        Permission::create(['guard_name' => 'web','name' => 'publish']);
        Permission::create(['guard_name' => 'web','name' => 'unpublish']);

        Role::create(['guard_name' => 'web','name' => 'user'])
            ->givePermissionTo(['view']);

        Role::create(['guard_name' => 'web','name'=>'advisor'])
            ->givePermissionTo(['view','insert','edit']);

        Role::create(['guard_name' => 'web','name' => 'agent'])
            ->givePermissionTo(['view', 'insert', 'edit', 'publish', 'unpublish']);

        Role::create(['guard_name' => 'web','name' => 'admin'])
            ->givePermissionTo(Permission::all());
    }
}

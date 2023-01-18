<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleTrainer = Role::create(['name' => 'trainer']);

        Permission::create(['name' => 'list sports'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'create sports'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'update sports'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'delete sports'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'list positions'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'create positions'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'update positions'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'delete positions'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'list teams'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'create teams'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'update teams'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'delete teams'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'list trainers'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'create trainers'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'update trainer'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'delete trainers'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'list players'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'create players'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'update players'])->syncRoles([$roleAdmin, $roleTrainer]);
        Permission::create(['name' => 'delete players'])->syncRoles([$roleAdmin, $roleTrainer]);
    }
}

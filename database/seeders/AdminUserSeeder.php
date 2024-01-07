<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Permission;
use App\Models\Role;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'salsafh@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('Administrator');

        $permissions = Permission::all();
        $role = Role::where('name', 'Administrator')->first();
        $role = $role->givePermissionTo($permissions);
        $user->syncRoles($role);
    }
}

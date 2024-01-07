<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'user_manage',
            ],
            [
                'name' => 'role_manage',
            ],
            [
                'name' => 'role_edit',
            ],
            [
                'name' => 'role_show',
            ],
        ];
    
        foreach ($permissions as $permissionData) {
            Permission::firstOrCreate([
                'name' => $permissionData['name'],
                'guard_name' => 'web',
            ]);
        }
    }
}

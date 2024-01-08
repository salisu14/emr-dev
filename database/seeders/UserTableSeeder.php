<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Creates seeder for users table.
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            $this->command->info('Truncating User, Role and Permission tables');
            $this->truncateLaratrustTables();

            // ===================
            // CREATING ROLES
            // ===================
            $superAdminRole = new Role();
            $superAdminRole->name = "super_admin";
            $superAdminRole->display_name = "Super Administrator";
            $superAdminRole->description  = 'User is the super admin of the system';
            $superAdminRole->save();

            $physicianRole = new Role();
            $physicianRole->name = "physician";
            $physicianRole->display_name = "Physician";
            $physicianRole->description  = 'User is the physician. They own/manage, but fewer privileges than super admins.';
            $physicianRole->save();


            $userRole = new Role();
            $userRole->name = "patient";
            $userRole->display_name = "Patient";
            $userRole->description  = 'Patient User who was registered as a patient';
            $userRole->save();

            // =======================
            // CREATING PERMISSIONS
            // =======================
            $manageUsers = new Permission();
            $manageUsers->name         = 'manage-users';
            $manageUsers->display_name = 'Manage Users';
            $manageUsers->description  = 'Manage all users of the system';
            $manageUsers->save();

            // Super Admin (super admin user)
            $user = User::create([
                'name' => 'Muhammad S. Ali',
                'email' => 'salsafh@gmail.com',
                'password' => bcrypt('password'),
            ]);
            $user->save();
            $user->attachRole($superAdminRole);
            $superAdminRole->attachPermissions([$manageUsers]);

            // Admin user (default user to login with)
            $user = User::create([
                'name' => 'Ibrahim Safiyan',
                'email' => 'ibrdev@gmail.com',
                'password' => bcrypt('password'),
            ]);
            $user->save();
            $user->attachRole($physicianRole);
            $physicianRole->attachPermissions([$manageUsers]);

        }

        // Creating random user
        User::factory()
            ->count(25)
            ->create();
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return void
     */
    public function truncateLaratrustTables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permission_role')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();
        User::truncate();
        Role::truncate();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use App\User;
use Bican\Roles\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->delete();

        $adminRole = Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
        ]);

        $admin_user = User::where('email', '=', 'admin@admin.com')->first();
        $admin_user->attachRole($adminRole);

        $accountManager = Role::create([
            'name' => 'Account Manager',
            'slug' => 'manager'
        ]);

        $account_manager = User::where('email', '=', 'pascal@admin.com')->first();
        $account_manager->attachRole($accountManager);
    }
}

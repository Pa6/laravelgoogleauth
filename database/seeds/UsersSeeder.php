<?php

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(['email' => 'admin@admin.com' , 'username' => 'admin user', 'password' => Hash::make('admin'), 'phone' => '+250786160780']);
        User::create(['email' => 'pascal@admin.com', 'username' => 'Pascal', 'password' => Hash::make('pascal'), 'phone' => '+250788355919']);

    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement("DELETE FROM roles");
    	DB::statement("DELETE FROM users");
        DB::table('roles')->insert([
        		'id' => 1,
                'role' => 'admin',
                'permissions' => null,
        ]);
        DB::table('roles')->insert([
        		'id' => 2,
                'role' => 'teacher',
                'permissions' => null,
        ]);
        DB::table('roles')->insert([
        		'id' => 3,
                'role' => 'student',
                'permissions' => null,
        ]);
        DB::table('roles')->insert([
        		'id' => 4,
                'role' => 'stuff',
                'permissions' => null,
        ]);
        DB::table('users')->insert([
                'name' => 'Admin',
                'role_id' => 1,
                'email' => 'admin@cttedu.org',
                'password' => bcrypt('adminofctt'),
                'is_active' => 1,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
			'name' => 'Superadmin',
			'email' => 'superadmin@teste.com.br',
			'password' => bcrypt('secret'),
			'admin_id' => 1
		]);

    }
}

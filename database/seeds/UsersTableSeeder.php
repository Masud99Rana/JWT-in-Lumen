<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10;$i++){
            $name = "Masud".rand('1','99');
        	DB::table('users')->insert([
				'name' => $name,
				'email' => $name.'@gmail.com',
				'password' => app('hash')->make('mypass')
			]);
        }
}
}

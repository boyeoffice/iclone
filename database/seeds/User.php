<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
//use App\User;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         'username'          	 =>    'devboye',
         'first_name'        	 =>     'Olakunle',
         'last_name'			 =>		'Boye',
         'email'       			 =>     'devboye@clone.com',
         'gender'				=>		'1',
         'slug'					=>		'devboye',
         'date_of_birth'		=>		Carbon::now(),
         'is_admin'				=>		'1',
         'status'				=>		'1',
         'confirmation_code'	=>		str_random(64),
         'password'				=>		Hash::make('123456'),
         'created_at'  			=> Carbon::now(),
         'updated_at' 			 => Carbon::now()
        	]);

        DB::table('users')->insert([
         'username'          	 =>    'malik',
         'first_name'        	 =>     'Malik',
         'last_name'			 =>		'Malik',
         'email'       			 =>     'malik@clone.com',
         'gender'				=>		'1',
         'slug'					=>		'devboye',
         'date_of_birth'		=>		Carbon::now(),
         'is_admin'				=>		'1',
         'status'				=>		'1',
         'confirmation_code'	=>		str_random(64),
         'password'				=>		Hash::make('123456'),
         'created_at'  			=> Carbon::now(),
         'updated_at' 			 => Carbon::now()
        	]);

        DB::table('users')->insert([
         'username'          	 =>    'ayo',
         'first_name'        	 =>     'Ayo',
         'last_name'			 =>		'Ayo',
         'email'       			 =>     'ayo@clone.com',
         'gender'				=>		'1',
         'slug'					=>		'ayo',
         'date_of_birth'		=>		Carbon::now(),
         'is_admin'				=>		'1',
         'status'				=>		'1',
         'confirmation_code'	=>		str_random(64),
         'password'				=>		Hash::make('123456'),
         'created_at'  			=> Carbon::now(),
         'updated_at' 			 => Carbon::now()
        	]);

        DB::table('users')->insert([
         'username'          	 =>    'philip',
         'first_name'        	 =>     'Philip',
         'last_name'			 =>		'Philip',
         'email'       			 =>     'philip@clone.com',
         'gender'				=>		'1',
         'slug'					=>		'philip',
         'date_of_birth'		=>		Carbon::now(),
         'is_admin'				=>		'1',
         'status'				=>		'1',
         'confirmation_code'	=>		str_random(64),
         'password'				=>		Hash::make('philip'),
         'created_at'  			=> Carbon::now(),
         'updated_at' 			 => Carbon::now()
        	]);
    }
}

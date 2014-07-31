<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder {

	 public function run()
    {

    	$user= new User;
    	$user->username = Config::get('admin.username');
    	$user->name = 'Administrator';
    	$user->email = Config::get('admin.email');
    	$user->password = Hash::make(Config::get('admin.password'));
    	$user->role_id = 1;
    	$user->active = 1;
    	$user->save(); 

    }

}
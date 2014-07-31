<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = new User;
		$user->username = "admin";
		$user->email = "slawisha@yahoo.com";
		$user->password = Hash::make('admin');
		$user->active = 1;
		$user->role_id = 1;
		$user->save();

		$user = new User;
		$user->username = "manager";
		$user->email = "manager@yahoo.com";
		$user->password = Hash::make('manager');
		$user->active = 1;
		$user->role_id = 2;
		$user->save();

		$user = new User;
		$user->username = "member";
		$user->email = "member@yahoo.com";
		$user->password = Hash::make('member');
		$user->name =  'Member 1';
		$user->telephone= '1234556';
		$user->address = 'Imagine 34';
		$user->city = 'Mistery';
		$user->active = 1;
		$user->role_id = 3;
		$user->save();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
				'username' => $faker->username,
				'email' => $faker->email,
				'password' => Hash::make('123456'),
				'name' => $faker->name,
				'telephone' => $faker->numerify($string = '#########'),
				'address' => $faker->streetAddress,
				'city' => $faker->city,
				'active' => rand(0,1),
				'role_id' => 3
			]);
		}
	}

}
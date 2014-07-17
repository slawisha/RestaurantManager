<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		$roles = ['admin', 'manager', 'member'];

		foreach($roles as $role)
		{
			Role::create([
				'name' => $role
			]);
		}
	}

}
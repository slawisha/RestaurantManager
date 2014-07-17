<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder {

	public function run()
	{
		$tables = Table::lists('id');

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Order::create([
				'table_id' => $faker->randomElement($tables)
			]);
		}
	}

}
<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 50) as $index)
		{
			Item::create([
				'name' => $faker->text(10),
				'description' => $faker->text(200),
				'price' => $faker->randomFloat(2,0,100),
				'item_category_id' => $faker->randomElement([1,2,3,4,5])
			]);
		}
	}

}
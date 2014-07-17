<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ItemsOrdersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$items = Item::lists('id');
		$orders = Order::lists('id');

		foreach($orders as $order)
		{
			$itemsUsed = [];
			foreach (range(1,$faker->numberBetween(1,10)) as $index) {
				$itemId = $items[$index];
				if( !in_array($itemId, $itemsUsed) )
				ItemOrder::create([
				'order_id' => $order,
				'item_id' => $itemId,
				'quantity' => $faker->numberBetween(0,5)
				]);
				$itemsUsed[] = $itemId;
			}

		}
	}

}
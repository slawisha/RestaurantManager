<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Carbon\Carbon;

class ReservationsTableSeeder extends Seeder {

	public function run()
	{
		$tableIds = Table::whereAvailable(1)->lists('id');
		$userIds = User::lists('id');

		$faker = Faker::create();

		$tablesUsed = [];
		

		foreach($tableIds as $tableId)
		{
			$start = Carbon::now()->startOfDay();
			$reservationStart = $start->addHours(rand(0,720));
			//$active = ($reservationStart->isToday()) ? 1 : 0; 
			Reservation::create([
				'user_id' => $faker->randomElement($userIds),
				'table_id' => $tableId,
				'reservation_start' => $reservationStart,
				'reservation_end' => $start->addHours(3),
				'seats' => $faker->randomElement([2,4,8]),
				'active' => 1
			]);
		}
	}

}
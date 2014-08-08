<?php namespace Petrovic\Transformers;

use Table;

class ReservationTransformer extends Transformer{

	public function transform($reservation)
	{
		return [
			'id' => $reservation['id'],
			'user' => $reservation['user']['name'],
			'username' => $reservation['user']['username'],
			'table_id' => $reservation['table_id'],
			'table_number' => Table::find($reservation['table_id'])->number,
			'reservation_start' => $reservation['reservation_start'],
			'reservation_end' => $reservation['reservation_end'],
			'active' => $reservation['active']
		];
	}
}
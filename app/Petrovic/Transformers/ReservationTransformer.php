<?php namespace Petrovic\Transformers;

class ReservationTransformer extends Transformer{

	public function transform($reservation)
	{
		return [
			'id' => $reservation['id'],
			'user' => $reservation['user']['name'],
			'username' => $reservation['user']['username'],
			'table' => $reservation['table_id'],
			'reservation_start' => $reservation['reservation_start'],
			'reservation_end' => $reservation['reservation_end']
		];
	}
}
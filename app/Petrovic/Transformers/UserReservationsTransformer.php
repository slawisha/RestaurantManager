<?php namespace Petrovic\Transformers;

use Table;

class UserReservationsTransformer extends Transformer{

	public function transform($userReservations)
	{
			return [
				'id' => $userReservations['id'],
				'user_id' => $userReservations['user_id'],
				'table_id' => $userReservations['table_id'],
				'table_number' => Table::find($userReservations['table_id'])->number,
				'reservation_start' => $userReservations['reservation_start'],
				'reservation_end' => $userReservations['reservation_end'],
				'active' => $userReservations['active'],
			];	
	}
}
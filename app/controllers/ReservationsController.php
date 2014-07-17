<?php
use Carbon\Carbon;

class ReservationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reservations
	 *
	 * @return Response
	 */
	public function index()
	{
		$reservations = Reservation::all();
		return Response::json(['data' => $reservations->toArray()], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /reservations/create
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reservations
	 *
	 * @return Response
	 */
	public function store()
	{
		$userId = Auth::user()->id;
		$tableId = Input::get('table_id');
		$day = Input::get('day');
		$month = Input::get('month');
		$year = Input::get('year');
		$time = explode(':', Input::get('time'));
		$hour = $time[0];
		$minute = $time[1];
		$date = Carbon::create($year, $month, $day, $hour, $minute, 0);

		$reservation = new Reservation();
		$reservation->user_id = $userId;
		$reservation->table_id = $tableId;
		$reservation->reservation_start = $date;
		$reservation->reservation_end = $date->addHours(3);
		$reservation->active = 1;
		$reservation->save();
	}

	/**
	 * Display the specified resource.
	 * GET /reservations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /reservations/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /reservations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /reservations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function check()
	{

		$day = Input::get('day');
		$month = Input::get('month');
		$year = Input::get('year');
		$time = explode(':', Input::get('time'));
		$hour = $time[0];
		$minute = $time[1];
		$date = Carbon::create($year, $month, $day, $hour, $minute, 0);
		

		$reservations = Reservation::all();
		$reservedTables = [];
		foreach ($reservations as $reservation) {
			if( $date->between($reservation->reservation_start,$reservation->reservation_start->addHours(3)) ) {
				$reservedTables[] = $reservation->table_id;
			} 		
		}
		

		return Response::json(['data' => $reservedTables]);
	}

}
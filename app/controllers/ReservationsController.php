<?php
use Carbon\Carbon;
use Petrovic\Transformers\ReservationTransformer;

class ReservationsController extends \BaseController {

	/**
	 * @var Petrovic\Transformers\ReservationTransformer
	 */
	protected $reservationTransformer;

	public function __construct(ReservationTransformer $reservationTransformer)
	{
		$this->reservationTransformer = $reservationTransformer;
	}

	/**
	 * Display a listing of the resource.
	 * GET /reservations
	 *
	 * @return Response
	 */
	public function index()
	{
		$reservations = Reservation::with('User')->orderBy('reservation_start','ASC')->paginate(8);
		return Response::json(['data' => $this->reservationTransformer->transformCollection($reservations->getCollection()->all()),
			'paginator' => $this->reservationTransformer->paginate($reservations)], 200);
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
		$reservation = Reservation::find($id);
		return Response::json(['data' => $this->reservationTransformer->transform($reservation)], 200);
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
		$user = User::whereUsername(Input::get('username'))->first();
		$table = Table::whereNumber(Input::get('table'))->first();
		$reservation = Reservation::find($id);
		$reservation->user_id = $user->id;
		$reservation->table_id = $table->id;
		$reservation->reservation_start = Input::get('start');
		$reservation->reservation_end = Input::get('end');
		$reservation->active = Input::get('active');
		$reservation->save();

		return Response::json(['data' => 'Reservation updated'], 200);
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
		Reservation::find($id)->delete();
		return Response::json(['data' => 'Reservation deleted'], 200);
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
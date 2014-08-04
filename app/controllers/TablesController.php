<?php

use Petrovic\Transformers\TableTransformer;

class TablesController extends \BaseController {

	/**
	 * @var Petrovic\Transformers\TableTransformer
	 */
	protected $tableTransformer;

	public function __construct(TableTransformer $tableTransformer)
	{
		$this->tableTransformer = $tableTransformer;
	}

	/**
	 * Display a listing of the resource.
	 * GET /table
	 *
	 * @return Response
	 */
	public function index()
	{
		$perPage = Input::get('perPage');
		$tables =  Table::paginate($perPage);
		return  Response::json(['data' => $this->tableTransformer->transformCollection($tables->getCollection()->all()),
			'paginator' => $this->tableTransformer->paginate($tables)], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /table/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$table = new Table;
		$table->number = Input::get('number');
		$table->seats = Input::get('seats');
		$table->position = Input::get('position');
		$table->description = Input::get('description');
		$table->available = Input::get('available');
		$table->image_url = (Input::file('thumbnail')) ? : '/upload/table_thumb.jpg';
		$table->save();
		return Response::json(['data'=>'Table saved'], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /table
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 * GET /table/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$table = Table::find($id);
		return Response::json(['data' => $this->tableTransformer->transform($table)], 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /table/{id}/edit
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
	 * PUT /table/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//dd(Input::all());
		$table = Table::find($id);
		$table->number = Input::get('number');
		$table->seats = Input::get('seats');
		$table->position = Input::get('position');
		$table->description = Input::get('description');
		$table->available = Input::get('available');
		$table->image_url = (Input::file('thumbnail')) ? : '/upload/table_thumb.jpg';
		$table->save();

		return Response::json(['data'=>'Table updated'], 200);
	}

	public function reserve($id)
	{
		$table = Table::find($id);
		$table->reserved = 1;
		$table->available = 0;
		$table->save();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /table/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Table::find($id)->delete();
		return Response::json(['data'=>'Table deleted'], 200);
	}

}
<?php

use Petrovic\Transformers\UserTransformer as UserTransformer;

class UsersController extends \BaseController {

	/**
	 * @var Petrovic\Transformers\UserTransformer 
	 */
	protected $userTransformer;

	public function __construct(UserTransformer $userTransformer)
	{
		$this->userTransformer = $userTransformer;
	}

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::with('role')->paginate(5); //returns a paginator instance
		return Response::json(['data' => $this->userTransformer->transformCollection($users->getCollection()->all()),
			'paginator'=> $this->userTransformer->paginate($users)
			], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;
		$role = Role::whereName(strtolower(Input::get('role')))->first();
		$user->username = Input::get('username');
		$user->name = Input::get('name');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');
		$user->address = Input::get('address');
		$user->telephone = Input::get('telephone');
		$user->city = Input::get('city');
		$user->role_id = $role->id;
		$user->active = Input::get('active');
		$user->save();

		return Response::json(['data'=>'User saved'], 200);
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::with('role')->find($id);
		return Response::json(['data' => $this->userTransformer->transform($user)], 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$role = Role::whereName(strtolower(Input::get('role')))->first();
		$user->username = Input::get('username');
		$user->name = Input::get('name');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');
		$user->address = Input::get('address');
		$user->telephone = Input::get('telephone');
		$user->city = Input::get('city');
		$user->role_id = $role->id;
		$user->active = Input::get('active');
		$user->save();

		return Response::json(['data'=>'User saved'], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::find($id)->delete();
	}
}
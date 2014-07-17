<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		
		//return User::with('role')->paginate(5);
		$users = User::with('role')->paginate(5); //returns a paginator instance
		return Response::json(['data'=>$this->transformCollection($users->getCollection()),
			'paginator'=>[
				'total' => $users->getTotal(),
				"per_page"=> $users->getPerPage(),
			    "current_page"=> $users->getCurrentPage(),
			    "last_page"=> $users->getLastPage(),
			    "from" => $users->getFrom(),
			    "to" => $users->getTo()
				]
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
		return Response::json(['data'=>$this->transform($user)], 200);
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

	private function transform($user)
	{
			return [
				'id' => $user['id'],
				'username' => $user['username'],
				'name' => $user['name'],
				'email' => $user['email'],
				'telephone' => $user['telephone'],
				'address' => $user['address'],
				'city' => $user['city'],
				'role' => ucfirst($user['role']['name']),
				'active' => $user['active']
			];	
	}

	private function transformCollection($users)
	{
		return array_map([$this, 'transform'], $users->toArray());	
	}

}
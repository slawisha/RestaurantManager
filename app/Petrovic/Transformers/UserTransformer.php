<?php namespace Petrovic\Transformers;

class UserTransformer extends Transformer{

	public function transform($user)
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
}
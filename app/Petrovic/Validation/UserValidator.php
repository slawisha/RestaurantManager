<?php namespace Petrovic\Validation;

class UserValidator extends Validator{

	protected static $rules = [
		'username' => 'required|min:6',
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed',
		'telephone' => 'required|numeric',
		'address' => 'required',
		'city' => 'required',
	]; 
}
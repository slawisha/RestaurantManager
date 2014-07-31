<?php namespace Petrovic\Validation;

use Illuminate\Validation\Factory;

abstract class Validator{

	protected $validator;

	public function __construct(Factory $validator)
	{
		$this->validator = $validator;
	}

	public function fire($data)
	{
		$validation = $this->validator->make($data, static::$rules);

		if ( $validation->fails() ) throw new ValidationException($validation->messages());

		return true;
	}
}

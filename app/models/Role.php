<?php

class Role extends \Eloquent {
	protected $fillable = ['name'];
	public function users()
	{
		return $this->hasMany('User');
	}
}
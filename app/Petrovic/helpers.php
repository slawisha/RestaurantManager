<?php

if ( !function_exists('checkRole'))
{
	function checkRole($roleName)
	{
		if( Auth::check() )
		{
			$id = Auth::user()->id;
			$role = User::find($id)->role;
			if($role->name == $roleName) return true;
		}
		return false;
	}
}
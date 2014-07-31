<?php

class PagesController extends \BaseController {

	public function register()
	{
		return View::make('pages.register');
	}

	public function reservation()
	{
		return View::make('pages.reservation');
	}

	public function admin()
	{
		return View::make('pages.admin');
	}

}
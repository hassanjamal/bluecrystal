<?php

class AdminDashboardController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('admin/dashboard');
	}

}
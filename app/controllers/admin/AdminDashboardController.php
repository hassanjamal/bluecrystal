<?php

class AdminDashboardController extends AdminController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        if(Sentry::check())
        {
            return View::make('admin/dashboard');
        }
        else
        {
            return Redirect::to('user/login')->with('error', " You are not logged in ");  
        }

    }
}

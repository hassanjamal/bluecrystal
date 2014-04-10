<?php

class SentryGroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('groups')->delete();
		// creating super user
		Sentry::getGroupProvider()->create(array(
	        'name'        => 'SuperUser',
	        'permissions' => array(
	               'superuser' => 1
	        )));

		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Branch-Admin',
	        'permissions' => array(
	            'associate-view'   => 1,
	            'associate-edit'   => 1,
	            'associate-delete' => 1,
	            'associate-create' => 1,
	            'policy-view'      => 1,
	            'policy-edit'      => 1,
	            'policy-delete'    => 1,
	            'policy-create'    => 1,
	           	'user-view'        => 1,
	            'user-edit'        => 1,
	            'user-delete'      => 1,
	            'user-create'      => 1,
	            'rank-view'        => 1,
	            'rank-edit'        => 0,
	            'rank-delete'      => 0,
	            'rank-create'      => 0,
	            'branch-view'      => 1,
	            'branch-edit'      => 1,
	            'branch-delete'    => 0,
	            'branch-create'    => 0,

	        )));

		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Branch-User',
	        'permissions' => array(
	            'associate-view'   => 1,
	            'associate-edit'   => 0,
	            'associate-delete' => 0,
	            'associate-create' => 1,
	            'policy-view'      => 1,
	            'policy-edit'      => 0,
	            'policy-delete'    => 0,
	            'policy-create'    => 1,
	           	'user-view'        => 0,
	            'user-edit'        => 0,
	            'user-delete'      => 0,
	            'user-create'      => 0,
	            'rank-view'        => 1,
	            'rank-edit'        => 0,
	            'rank-delete'      => 0,
	            'rank-create'      => 0,
	            'branch-view'      => 1,
	            'branch-edit'      => 0,
	            'branch-delete'    => 0,
	            'branch-create'    => 0,
	        )));

		// Sentry::getGroupProvider()->create(array(
	    //     'name'        => 'Users',
	    //     'permissions' => array(
	    //         'view'   => 1,
	    //         'edit'   => 0,
	    //         'delete' => 0,
	    //         'update' => 0,
	    //     )));

		// Sentry::getGroupProvider()->create(array(
	    //     'name'        => 'Admins',
	    //     'permissions' => array(
	    //         'view'   => 1,
	    //         'edit'   => 1,
	    //         'delete' => 1,
	    //         'update' => 1,
	    //     )));
	}

}

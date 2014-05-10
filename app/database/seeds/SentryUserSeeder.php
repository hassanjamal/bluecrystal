<?php

class SentryUserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		Sentry::getUserProvider()->create(array(
	        'email'    => 'admin@example.com',
	        'password' => 'admin123',
	        'activated' => 1,
	        'first_name' => 'Super',
	        'last_name' => 'Admin',
	        'branch_id' => 0
	    ));

		Sentry::getUserProvider()->create(array(
	        'email'    => 'patadmin@example.com',
	        'password' => 'admin123',
	        'activated' => 1,
	       	'first_name' => 'Patna',
	        'last_name' => 'Admin',
	        'branch_id' => 1

	    ));

	    Sentry::getUserProvider()->create(array(
	        'email'    => 'patuser@example.com',
	        'password' => 'user123',
	        'activated' => 1,
	       	'first_name' => 'Patna',
	        'last_name' => 'User',
	        'branch_id' => 1

	    ));

	    Sentry::getUserProvider()->create(array(
	        'email'    => 'jamadmin@example.com',
	        'password' => 'admin123',
	        'activated' => 1,
	       	'first_name' => 'Jamshedpur',
	        'last_name' => 'Admin',
	        'branch_id' => 2

	    ));

	    Sentry::getUserProvider()->create(array(
	        'email'    => 'jamuser@example.com',
	        'password' => 'user123',
	        'activated' => 1,
	       	'first_name' => 'Jamshedpur',
	        'last_name' => 'User',
	        'branch_id' => 2

	    ));
	}

}
<?php

class SchemeamountTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('schemeamount')->truncate();

		$schemeamount = array(
		                      array(
		             'amount' => 1000
		             ),
		       array(
		             'amount' => 10000
		             ),
		       array(
		             'amount' => 25000
		             ),
		       array(
		             'amount' => 50000
		             ),
		       array(
		             'amount' => 100000
		             ),
		);

		// Uncomment the below to run the seeder
		DB::table('schemeamount')->insert($schemeamount);
	}

}

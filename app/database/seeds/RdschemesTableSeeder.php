<?php

class RdschemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('rdschemes')->truncate();
		//grabbing current time
		$now= date('Y-m-d H:i:s');
		$rdschemes = array(
		                   array(
		         	      'name'             => 'RD01',
		         	      'interest'         => 9.50,
		         	      'special_interest' => 10.00,
		         	      'years'            => 1,
		         	      'year_name'        => 'one',
		         	      'description'      => 'Recurring Deposit Plan For 1 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
					array(
		         	      'name'             => 'RD02',
		         	      'interest'         => 10.00,
		         	      'special_interest' => 10.50,
		         	      'years'            => 2,
		         	      'year_name'        => 'two',
		         	      'description'      => 'Recurring Deposit Plan For 2 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
					array(
		         	      'name'             => 'RD03',
		         	      'interest'         => 10.50,
		         	      'special_interest' => 11.00,
		         	      'years'            => 3,
		         	      'year_name'        => 'three',
		         	      'description'      => 'Recurring Deposit Plan For 3 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
					array(
		         	      'name'             => 'RD04',
		         	      'interest'         => 11.00,
		         	      'special_interest' => 11.50,
		         	      'years'            => 4,
		         	      'year_name'        => 'four',
		         	      'description'      => 'Recurring Deposit Plan For 4 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
					array(
		         	      'name'             => 'RD05',
		         	      'interest'         => 12.00,
		         	      'special_interest' => 12.50,
		         	      'years'            => 5,
		         	      'year_name'        => 'five',
		         	      'description'      => 'Recurring Deposit Plan For 5 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
					
		);

		// Uncomment the below to run the seeder
		DB::table('rdschemes')->insert($rdschemes);
	}

}

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
		         	      'name'        => 'RD01',
		         	      'interest'    => 10.00 ,
		         	      'years'       => 1,
		         	      'year_name'   => 'one',
		         	      'description' => 'Recurring Deposit Plan For 1 Year',
		         	      'created_at'  => $now,
		         	      'updated_at'  => $now,
		         	      ),
					array(
		         	      'name'        => 'RD02',
		         	      'interest'    => 10.25 ,
		         	      'years'       => 2,
		         	      'year_name'   => 'two',
		         	      'description' => 'Recurring Deposit Plan For 2 Year',
		         	      'created_at'  => $now,
		         	      'updated_at'  => $now,
		         	      ),
					array(
		         	      'name'        => 'RD03',
		         	      'interest'    => 10.75 ,
		         	      'years'       => 3,
		         	      'year_name'   => 'three',
		         	      'description' => 'Recurring Deposit Plan For 3 Year',
		         	      'created_at'  => $now,
		         	      'updated_at'  => $now,
		         	      ),
					array(
		         	      'name'        => 'RD04',
		         	      'interest'    => 11.50,
		         	      'years'       => 4,
		         	      'year_name'   => 'four',
		         	      'description' => 'Recurring Deposit Plan For 4 Year',
		         	      'created_at'  => $now,
		         	      'updated_at'  => $now,
		         	      ),
					array(
		         	      'name'        => 'RD05',
		         	      'interest'    => 12.50 ,
		         	      'years'       => 5,
		         	      'year_name'   => 'five',
		         	      'description' => 'Recurring Deposit Plan For 5 Year',
		         	      'created_at'  => $now,
		         	      'updated_at'  => $now,
		         	      ),
					array(
		         	      'name'        => 'RD06',
		         	      'interest'    => 13.00 ,
		         	      'years'       => 6,
		         	      'year_name'   => 'six',
		         	      'description' => 'Recurring Deposit Plan For 6 Year',
		         	      'created_at'  => $now,
		         	      'updated_at'  => $now,
		         	      ),
					array(
		         	      'name'        => 'RD07',
		         	      'interest'    => 14.00 ,
		         	      'years'       => 7 ,
		         	      'year_name'   => 'seven',
		         	      'description' => 'Recurring Deposit Plan For 7 Year',
		         	      'created_at'  => $now,
		         	      'updated_at'  => $now,
		         	      ),

		);
        // COMMENT
		// Uncomment the below to run the seeder
		DB::table('rdschemes')->insert($rdschemes);
	}

}

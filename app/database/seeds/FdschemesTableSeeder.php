<?php

class FdschemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('fdschemes')->delete();
		$now= date('Y-m-d H:i:s');
		$fdschemes = array(
		         	array(
		         	      'name' => 'FD01',
		         	      'interest' => 9.81 ,
		         	      'years' => 1,
		         	      'year_name' => 'one',
		         	      'description' => 'Fixed Deposit Plan For 1 Year',
		         	      'created_at' => $now,
		         	      'updated_at' => $now,
		         	      ),
					array(
		         	      'name' => 'FD02',
		         	      'interest' => 10.31 ,
		         	      'years' => 2,
		         	      'year_name' => 'two',
		         	      'description' => 'Fixed Deposit Plan For 2 Year',
		         	      'created_at' => $now,
		         	      'updated_at' => $now,
		         	      ),
					array(
		         	      'name' => 'FD03',
		         	      'interest' => 10.84 ,
		         	      'years' => 3,
		         	      'year_name' => 'three',
		         	      'description' => 'Fixed Deposit Plan For 3 Year',
		         	      'created_at' => $now,
		         	      'updated_at' => $now,
		         	      ),
					array(
		         	      'name' => 'FD04',
		         	      'interest' =>  11.35,
		         	      'years' => 4,
		         	      'year_name' => 'four',
		         	      'description' => 'Fixed Deposit Plan For 4 Year',
		         	      'created_at' => $now,
		         	      'updated_at' => $now,
		         	      ),
					array(
		         	      'name' => 'FD05',
		         	      'interest' => 11.55 ,
		         	      'years' => 5,
		         	      'year_name' => 'five',
		         	      'description' => 'Fixed Deposit Plan For 5 Year',
		         	      'created_at' => $now,
		         	      'updated_at' => $now,
		         	      ),
					array(
		         	      'name' => 'FD06',
		         	      'interest' => 11.8 ,
		         	      'years' => 6,
		         	      'year_name' => 'six',
		         	      'description' => 'Fixed Deposit Plan For 6 Year',
		         	      'created_at' => $now,
		         	      'updated_at' => $now,
		         	      ),
					array(
		         	      'name' => 'FD07',
		         	      'interest' => 14.28 ,
		         	      'years' =>7 ,
		         	      'year_name' => 'seven',
		         	      'description' => 'Fixed Deposit Plan For 7 Year',
		         	      'created_at' => $now,
		         	      'updated_at' => $now,
		         	      ),

		);

		// Uncomment the below to run the seeder
		DB::table('fdschemes')->insert($fdschemes);
	}

}

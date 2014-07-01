<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MisschemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('fdschemes')->delete();
		$now= date('Y-m-d H:i:s');
		$misschemes = array(
		         	array(
		         	      'name'             => 'MIS01',
		         	      'interest'         => 10.00 ,
		         	      'special_interest' => 10.50,
		         	      'years'            => 1,
		         	      'year_name'        => 'one',
		         	      'description'      => 'MIS Plan For 1 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
					array(
		         	      'name'             => 'MIS02',
		         	      'interest'         => 10.00,
		         	      'special_interest' => 10.50,
		         	      'years'            => 2,
		         	      'year_name'        => 'two',
		         	      'description'      => 'MIS Plan For 2 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
					array(
		         	      'name'             => 'MIS03',
		         	      'interest'         => 11.00,
		         	      'special_interest' => 11.50,
		         	      'years'            => 3,
		         	      'year_name'        => 'three',
		         	      'description'      => 'MIS Plan For 3 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
					array(
		         	      'name'             => 'MIS04',
		         	      'interest'         => 11.00,
		         	      'special_interest' => 11.50 ,
		         	      'years'            => 4,
		         	      'year_name'        => 'four',
		         	      'description'      => 'MIS Plan For 4 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
					array(
		         	      'name'             => 'MIS05',
		         	      'interest'         => 12.00,
		         	      'special_interest' => 12.50,
		         	      'years'            => 5,
		         	      'year_name'        => 'five',
		         	      'description'      => 'MIS Plan For 5 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
					array(
		         	      'name'             => 'MIS06',
		         	      'interest'         => 12.00,
		         	      'special_interest' => 12.50,
		         	      'years'            => 6,
		         	      'year_name'        => 'six',
		         	      'description'      => 'MIS Plan For 6 Year',
		         	      'created_at'       => $now,
		         	      'updated_at'       => $now,
		         	      ),
		);

		// Uncomment the below to run the seeder
		DB::table('misschemes')->insert($misschemes);
	
}

}
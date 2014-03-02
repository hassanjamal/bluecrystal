<?php

class RanksTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('ranks')->truncate();
		$now= date('Y-m-d H:i:s');

		/**
		 * Company node
		 */
		$ranks = array('rank_no' =>99999,
		                    'rankname'   => 'COMPANY',
		                    'company'    => TRUE,
		                    'created_at' => $now,
		         	        'updated_at' => $now);
		$id= DB::table('ranks')->insertGetId($ranks);


		/**
		 * 1 rank
		 * team commsion made 0
		 */
		$ranks = array('rank_no' =>1,
		                    'rankname'   => 'CONSULTANT',
		                    'created_at' => $now,
		         	        'updated_at' => $now);
		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
					                      'one'   => 2.5,
		                    		      'two'   => 3.0,
		                    		      'three' => 4.0,
		                    		      'four'  => 5.0,
		                    		      'five'  => 5.8,
		                    		      'six'   => 7.0,
		                    		      'seven' => 0.0,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0,
		                    		      'two'     => 0,
		                    		      'three'   => 0,
		                    		      'four'    => 0,
		                    		      'five'    => 0,
		                    		      'six'     => 0,
		                    		      'seven'   => 0,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 4.5,
		                    		      'two'   => 4.75,
		                    		      'three' => 5.5,
		                    		      'four'  => 6.75,
		                    		      'five'  => 7.0,
		                    		      'six'   => 0.0,
		                    		      'seven' => 0.0,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0,
		                    		      'two'     => 0,
		                    		      'three'   => 0,
		                    		      'four'    => 0,
		                    		      'five'    => 0,
		                    		      'six'     => 0,
		                    		      'seven'   => 0,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		/**
		 * for 2 rank
		 */

		$ranks = array('rank_no' =>2,
		                    'rankname'   => 'FIELD OFFICER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
					                      'one'   => 3.7,
		                    		      'two'   => 4.4,
		                    		      'three' => 5.8,
		                    		      'four'  => 6.9,
		                    		      'five'  => 7.8,
		                    		      'six'   => 9.1,
		                    		      'seven' => 0.0,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 1.20,
		                    		      'two'     => 1.40,
		                    		      'three'   => 1.80,
		                    		      'four'    => 1.90,
		                    		      'five'    => 2.00,
		                    		      'six'     => 2.10,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 5.6,
		                    		      'two'   => 6.0,
		                    		      'three' => 7.0,
		                    		      'four'  => 8.45,
		                    		      'five'  => 9.0,
		                    		      'six'   => 0,
		                    		      'seven' => 0,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		      'one'     => 1.10,
		                    		      'two'     => 1.25,
		                    		      'three'   => 1.50,
		                    		      'four'    => 1.70,
		                    		      'five'    => 2.00,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for 3 rank
		 */

		$ranks = array('rank_no' =>3,
		                    'rankname'   => 'SR FIELD OFFICER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										  'one' => 4.9,
		                    		      'two'   => 5.7,
		                    		      'three' => 7.3,
		                    		      'four'  => 8.5,
		                    		      'five'  => 9.5,
		                    		      'six'   => 10.9,
		                    		      'seven' => 0.0,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 1.20,
		                    		      'two'     => 1.30,
		                    		      'three'   => 1.50,
		                    		      'four'    => 1.60,
		                    		      'five'    => 1.70,
		                    		      'six'     => 1.80,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 6.6,
		                    		      'two'   => 7.15,
		                    		      'three' => 8.4,
		                    		      'four'  => 10.05,
		                    		      'five'  => 11.0,
		                    		      'six'   => 0.0,
		                    		      'seven' => 0.0,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		      'one'     => 1.00,
		                    		      'two'     => 1.15,
		                    		      'three'   => 1.40,
		                    		      'four'    => 1.60,
		                    		      'five'    => 2.00,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for 4 rank
		 */

		$ranks = array('rank_no' =>4,
		                    'rankname'   => 'ORGANISER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 6.0,
		                    		      'two'   => 6.9,
		                    		      'three' => 8.5,
		                    		      'four'  => 9.7,
		                    		      'five'  => 10.9,
		                    		      'six'   => 12.4,
		                    		      'seven' => 0.0,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		     'one' => 1.10,
		                    		      'two'     => 1.20,
		                    		      'three'   => 1.20,
		                    		      'four'    => 1.20,
		                    		      'five'    => 1.40,
		                    		      'six'     => 1.50,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 7.6,
		                    		      'two'   => 8.2,
		                    		      'three' => 9.6,
		                    		      'four'  => 11.65,
		                    		      'five'  => 12.7,
		                    		      'six'   => 0.0,
		                    		      'seven' => 0.0,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 1.00,
		                    		      'two'     => 1.05,
		                    		      'three'   => 1.20,
		                    		      'four'    => 1.60,
		                    		      'five'    => 1.70,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for 5 rank
		 */

		$ranks = array('rank_no' =>5,
		                    'rankname'   => 'SR ORGANISER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 7.0,
		                    		      'two'   => 8.10,
		                    		      'three' => 9.7,
		                    		      'four'  => 10.9,
		                    		      'five'  => 12.2,
		                    		      'six'   => 13.8,
		                    		      'seven' => 0.0,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		    'one' => 1.00,
		                    		      'two'     => 1.20,
		                    		      'three'   => 1.20,
		                    		      'four'    => 1.20,
		                    		      'five'    => 1.30,
		                    		      'six'     => 1.40,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 8.5,
		                    		      'two'   => 9.2,
		                    		      'three' => 10.7,
		                    		      'four'  => 13.05,
		                    		      'five'  => 14.4,
		                    		      'six'   => 0.0,
		                    		      'seven' => 0.0,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.90,
		                    		      'two'     => 1.00,
		                    		      'three'   => 1.10,
		                    		      'four'    => 1.40,
		                    		      'five'    => 1.70,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for 6 rank
		 */

		$ranks = array('rank_no' =>6,
		                    'rankname'   => 'SPL ORGANISER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 7.9,
		                    		      'two'   => 9.2,
		                    		      'three' => 10.7,
		                    		      'four'  => 12.0,
		                    		      'five'  => 13.5,
		                    		      'six'   => 15.2,
		                    		      'seven' => 0.0,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0.90,
		                    		      'two'     => 1.10,
		                    		      'three'   => 1.00,
		                    		      'four'    => 1.10,
		                    		      'five'    => 1.30,
		                    		      'six'     => 1.40,
		                    		      'seven'   => 00.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 9.4,
		                    		      'two'   => 10.10,
		                    		      'three' => 11.65,
		                    		      'four'  => 14.25,
		                    		      'five'  => 15.9,
		                    		      'six'   => 0.0,
		                    		      'seven' => 0.0,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.90,
		                    		      'two'     => 0.90,
		                    		      'three'   => 0.95,
		                    		      'four'    => 1.20,
		                    		      'five'    => 1.50,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for 7 rank
		 */

		$ranks = array('rank_no' =>7,
		                    'rankname'   => 'INSPECTOR',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 8.8,
		                    		      'two'   => 10.4,
		                    		      'three' => 11.7,
		                    		      'four'  => 13.1,
		                    		      'five'  => 14.7,
		                    		      'six'   => 16.5,
		                    		      'seven' => 0.0,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0.90,
		                    		      'two'     => 1.20,
		                    		      'three'   => 1.00,
		                    		      'four'    => 1.10,
		                    		      'five'    => 1.20,
		                    		      'six'     => 1.30,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		       'one' => 10.2,
		                    		      'two'   => 11.0,
		                    		      'three' => 12.55,
		                    		      'four'  => 15.4,
		                    		      'five'  => 17.4,
		                    		      'six'   => 0.00,
		                    		      'seven' => 0.00,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.80,
		                    		      'two'     => 0.90,
		                    		      'three'   => 0.90,
		                    		      'four'    => 1.15,
		                    		      'five'    => 1.50,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for eight rank
		 */

		$ranks = array('rank_no' =>8,
		                    'rankname'   => 'SR INSPECTOR',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 9.6,
		                    		      'two'   => 11.5,
		                    		      'three' => 12.6,
		                    		      'four'  => 14.1,
		                    		      'five'  => 15.8,
		                    		      'six'   => 17.7,
		                    		      'seven' => 0.0,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0.80,
		                    		      'two'     => 1.1,
		                    		      'three'   => 0.90,
		                    		      'four'    => 1.00,
		                    		      'five'    => 1.10,
		                    		      'six'     => 1.20,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		       'one' => 11.0,
		                    		      'two'   => 11.85,
		                    		      'three' => 13.40,
		                    		      'four'  => 16.35,
		                    		      'five'  => 18.7,
		                    		      'six'   => 0.00,
		                    		      'seven' => 0.00,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.80,
		                    		      'two'     => 0.85,
		                    		      'three'   => 0.85,
		                    		      'four'    => 0.95,
		                    		      'five'    => 1.30,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for ninth rank
		 */

		$ranks = array('rank_no' =>9,
		                    'rankname'   => 'MARKETING MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 10.4,
		                    		      'two'   => 12.0,
		                    		      'three' => 13.5,
		                    		      'four'  => 15.1,
		                    		      'five'  => 16.9,
		                    		      'six'   => 18.8,
		                    		      'seven' => 00.00,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0.80,
		                    		      'two'     => 1.00,
		                    		      'three'   => 0.90,
		                    		      'four'    => 1.00,
		                    		      'five'    => 1.10,
		                    		      'six'     => 1.10,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		       'one' => 11.7,
		                    		      'two'   => 12.65,
		                    		      'three' => 14.2,
		                    		      'four'  => 17.3,
		                    		      'five'  => 19.7,
		                    		      'six'   => 0.0,
		                    		      'seven' => 0.00,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.70,
		                    		      'two'     => 0.80,
		                    		      'three'   => 0.80,
		                    		      'four'    => 0.95,
		                    		      'five'    => 1.00,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for tenth rank
		 */

		$ranks = array('rank_no' =>10,
		                    'rankname'   => 'SR. MARKETING MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										'one' => 11.1,
		                    		      'two'   => 12.9,
		                    		      'three' => 14.3,
		                    		      'four'  => 16.0,
		                    		      'five'  => 18.0,
		                    		      'six'   => 19.9,
		                    		      'seven' => 0.00,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0.70,
		                    		      'two'     => 0.90,
		                    		      'three'   => 0.80,
		                    		      'four'    => 0.90,
		                    		      'five'    => 1.10,
		                    		      'six'     => 1.10,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 12.3,
		                    		      'two'   => 13.4,
		                    		      'three' => 14.95,
		                    		      'four'  => 18.2,
		                    		      'five'  => 20.5,
		                    		      'six'   => 0.00,
		                    		      'seven' => 0.00,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.60,
		                    		      'two'     => 0.75,
		                    		      'three'   => 0.75,
		                    		      'four'    => 0.80,
		                    		      'five'    => 0.80,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		/**
		 * for eleventh rank
		 */

		$ranks = array('rank_no' =>11,
		                    'rankname'   => 'REGIONAL MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										'one' => 11.8,
		                    		      'two'   => 13.7,
		                    		      'three' => 15.10,
		                    		      'four'  => 16.90,
		                    		      'five'  => 19.00,
		                    		      'six'   => 21.00,
		                    		      'seven' => 00.00,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0.70,
		                    		      'two'     => 0.80,
		                    		      'three'   => 0.80,
		                    		      'four'    => 0.90,
		                    		      'five'    => 1.00,
		                    		      'six'     => 1.10,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 12.5,
		                    		      'two'   => 14.1,
		                    		      'three' => 15.70,
		                    		      'four'  => 18.85,
		                    		      'five'  => 21.30,
		                    		      'six'   => 00.00,
		                    		      'seven' => 00.00,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.60,
		                    		      'two'     => 0.70,
		                    		      'three'   => 0.75,
		                    		      'four'    => 0.75,
		                    		      'five'    => 0.80,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for twelfth rank
		 */

		$ranks = array('rank_no' =>12,
		                    'rankname'   => 'SR. REGIONAL MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										'one' => 12.4,
		                    		      'two'   => 14.3,
		                    		      'three' => 15.85,
		                    		      'four'  => 17.7,
		                    		      'five'  => 20.0,
		                    		      'six'   => 22.0,
		                    		      'seven' => 0.00,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0.60,
		                    		      'two'     => 0.70,
		                    		      'three'   => 0.75,
		                    		      'four'    => 0.80,
		                    		      'five'    => 1.00,
		                    		      'six'     => 1.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 13.5,
		                    		      'two'   => 14.75,
		                    		      'three' => 16.35,
		                    		      'four'  => 19.55,
		                    		      'five'  => 21.00,
		                    		      'six'   => 00.00,
		                    		      'seven' => 00.00,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.60,
		                    		      'two'     => 0.65,
		                    		      'three'   => 0.65,
		                    		      'four'    => 0.70,
		                    		      'five'    => 0.70,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for thirteenth rank
		 */

		$ranks = array('rank_no' =>13,
		                    'rankname'   => ' FIELD ZONAL MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 13.0,
		                    		      'two'   => 15.0,
		                    		      'three' => 16.6,
		                    		      'four'  => 18.5,
		                    		      'five'  => 21.0,
		                    		      'six'   => 23.0,
		                    		      'seven' => 0.00,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0.60,
		                    		      'two'     => 0.70,
		                    		      'three'   => 0.75,
		                    		      'four'    => 0.80,
		                    		      'five'    => 1.00,
		                    		      'six'     => 1.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 14.00,
		                    		      'two'   => 15.4,
		                    		      'three' => 16.95,
		                    		      'four'  => 20.05,
		                    		      'five'  => 22.50,
		                    		      'six'   => 00.00,
		                    		      'seven' => 00.00,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.50,
		                    		      'two'     => 0.65,
		                    		      'three'   => 0.60,
		                    		      'four'    => 0.50,
		                    		      'five'    => 0.50,
		                    		      'six'     => 0.00,
		                    		      'seven'   => 0.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for fourteenth rank
		 */

		$ranks = array('rank_no' =>14,
		                    'rankname'   => 'FIELD EXECUTIVE MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 13.5,
		                    		      'two'   => 15.5,
		                    		      'three' => 17.3,
		                    		      'four'  => 19.2,
		                    		      'five'  => 22.1,
		                    		      'six'   => 24.00,
		                    		      'seven' => 0.0,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		       'one' => 0.50,
		                    		      'two'     => 0.50,
		                    		      'three'   => 0.70,
		                    		      'four'    => 0.70,
		                    		      'five'    => 1.0,
		                    		      'six'     => 1.0,
		                    		      'seven'   => 0.0,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 14.5,
		                    		      'two'   => 15.95,
		                    		      'three' => 17.5,
		                    		      'four'  => 20.55,
		                    		      'five'  => 23.0,
		                    		      'six'   => 00.00,
		                    		      'seven' => 00.00,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.50,
		                    		      'two'     => 0.55,
		                    		      'three'   => 0.55,
		                    		      'four'    => 0.50,
		                    		      'five'    => 0.5,
		                    		      'six'     => 0.0,
		                    		      'seven'   => 0.0,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for fifteenth rank
		 */

		$ranks = array('rank_no' =>15,
		                    'rankname'   => 'CHIEF EXECUTIVE MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 14.0,
		                    		      'two'   => 16.0,
		                    		      'three' => 18.0,
		                    		      'four'  => 20.0,
		                    		      'five'  => 23.0,
		                    		      'six'   => 25.0,
		                    		      'seven' => 0.0,
					                      'rank_id' => $id
					                    )
					                 );
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one'     => 0.50,
		                    		      'two'     => 0.50,
		                    		      'three'   => 0.70,
		                    		      'four'    => 0.80,
		                    		      'five'    => 0.9,
		                    		      'six'     => 1.0,
		                    		      'seven'   => 0.0,
		                    		      'rank_id' => $id
		                    		      )
		                             );

		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one'   => 15.0,
		                    		      'two'   => 16.5,
		                    		      'three' => 18.0,
		                    		      'four'  => 21.05,
		                    		      'five'  => 23.50,
		                    		      'six'   => 00.00,
		                    		      'seven' => 00.00,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.50,
		                    		      'two'     => 0.55,
		                    		      'three'   => 0.50,
		                    		      'four'    => 0.50,
		                    		      'five'    => 0.50,
		                    		      'six'     => 0.0,
		                    		      'seven'   => 0.0,
		                    		      'rank_id' => $id
		                    		      )
		                             );



	}

}

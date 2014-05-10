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
		                    'rankname' => 'COMPANY',
		                    'company' => TRUE,
		                    'created_at' => $now,
		         	        'updated_at' => $now);
		$id= DB::table('ranks')->insertGetId($ranks);


		/**
		 * 1 rank
		 * team commsion made 0
		 */
		$ranks = array('rank_no' =>1,
		                    'rankname' => 'INSPECTOR',
		                    'created_at' => $now,
		         	        'updated_at' => $now);
		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'   => 4.3,
		                    		      'seven' => 4.4,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0,
		                    		      'two' => 0,
		                    		      'three' => 0,
		                    		      'four' => 0,
		                    		      'five' => 0,
		                    		      'six' => 0,
		                    		      'seven' => 0,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		       'one' => 2,
		                    		      'two' => 2.5,
		                    		      'three' => 3,
		                    		      'four' => 4,
		                    		      'five' => 4.1,
		                    		      'six' => 4.3,
		                    		      'seven' => 4.4,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		      'one' => 0,
		                    		      'two' => 0,
		                    		      'three' => 0,
		                    		      'four' => 0,
		                    		      'five' => 0,
		                    		      'six' => 0,
		                    		      'seven' => 0,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		/**
		 * for 2 rank
		 */

		$ranks = array('rank_no' =>2,
		                    'rankname' => 'SR. INSPECTOR',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
					                      'one' => 2.5,
		                    		      'two' => 3,
		                    		      'three' => 3.5,
		                    		      'four' => 4.5,
		                    		      'five' => 5.6,
		                    		      'six' => 5,
		                    		      'seven' => 5,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.50,
		                    		      'two' => 0.50,
		                    		      'three' => 0.50,
		                    		      'four' => 0.50,
		                    		      'five' => 1.50,
		                    		      'six' => 0.70,
		                    		      'seven' => 0.60,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 2.5,
		                    		      'two' => 3,
		                    		      'three' => 3.5,
		                    		      'four' => 4.5,
		                    		      'five' => 5.6,
		                    		      'six' => 5,
		                    		      'seven' => 5,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.50,
		                    		      'two' => 0.50,
		                    		      'three' => 0.50,
		                    		      'four' => 0.50,
		                    		      'five' => 1.50,
		                    		      'six' => 0.70,
		                    		      'seven' => 0.60,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for 3 rank
		 */

		$ranks = array('rank_no' =>3,
		                    'rankname' => 'FIELD OFFICER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										  'one' => 3.5,
		                    		      'two' => 4,
		                    		      'three' => 4.9,
		                    		      'four' => 5.6,
		                    		      'five' => 6.6,
		                    		      'six' => 6.3,
		                    		      'seven' => 6.4,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 1.00,
		                    		      'two' => 1.00,
		                    		      'three' => 1.40,
		                    		      'four' => 1.10,
		                    		      'five' => 1.00,
		                    		      'six' => 1.30,
		                    		      'seven' => 1.40,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 3.5,
		                    		      'two' => 4,
		                    		      'three' => 4.9,
		                    		      'four' => 5.6,
		                    		      'five' => 6.6,
		                    		      'six' => 6.3,
		                    		      'seven' => 6.4,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		      'one' => 1.00,
		                    		      'two' => 1.00,
		                    		      'three' => 1.40,
		                    		      'four' => 1.10,
		                    		      'five' => 1.00,
		                    		      'six' => 1.30,
		                    		      'seven' => 1.40,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for 4 rank
		 */

		$ranks = array('rank_no' =>4,
		                    'rankname' => 'SR. FIELD OFFICER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 4.2,
		                    		      'two' => 4.8,
		                    		      'three' => 5.9,
		                    		      'four' => 6.6,
		                    		      'five' => 7.5,
		                    		      'six' => 7.5,
		                    		      'seven' => 7.7,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.70,
		                    		      'two' => 0.80,
		                    		      'three' => 1.00,
		                    		      'four' => 1.00,
		                    		      'five' => 0.90,
		                    		      'six' => 1.20,
		                    		      'seven' => 1.30,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 4.2,
		                    		      'two' => 4.8,
		                    		      'three' => 5.9,
		                    		      'four' => 6.6,
		                    		      'five' => 7.5,
		                    		      'six' => 7.5,
		                    		      'seven' => 7.7,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.70,
		                    		      'two' => 0.80,
		                    		      'three' => 1.00,
		                    		      'four' => 1.00,
		                    		      'five' => 0.90,
		                    		      'six' => 1.20,
		                    		      'seven' => 1.30,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for 5 rank
		 */

		$ranks = array('rank_no' =>5,
		                    'rankname' => 'MARKETING MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 4.9,
		                    		      'two' => 5.5,
		                    		      'three' => 6.7,
		                    		      'four' => 7.6,
		                    		      'five' => 8.4,
		                    		      'six' => 8.5,
		                    		      'seven' => 8.9,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		    'one' => 0.70,
		                    		      'two' => 0.70,
		                    		      'three' => 0.80,
		                    		      'four' => 1.00,
		                    		      'five' => 0.90,
		                    		      'six' => 1.00,
		                    		      'seven' => 1.20,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 4.9,
		                    		      'two' => 5.5,
		                    		      'three' => 6.7,
		                    		      'four' => 7.6,
		                    		      'five' => 8.4,
		                    		      'six' => 8.5,
		                    		      'seven' => 8.9,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.70,
		                    		      'two' => 0.70,
		                    		      'three' => 0.80,
		                    		      'four' => 1.00,
		                    		      'five' => 0.90,
		                    		      'six' => 1.00,
		                    		      'seven' => 1.20,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for 6 rank
		 */

		$ranks = array('rank_no' =>6,
		                    'rankname' => 'SR. MARKETING MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 5.5,
		                    		      'two' => 6.1,
		                    		      'three' => 7.4,
		                    		      'four' => 8.5,
		                    		      'five' => 9.2,
		                    		      'six' => 9.5,
		                    		      'seven' => 10,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.60,
		                    		      'two' => 0.60,
		                    		      'three' => 0.70,
		                    		      'four' => 0.90,
		                    		      'five' => 0.80,
		                    		      'six' => 1.00,
		                    		      'seven' => 1.10,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 5.5,
		                    		      'two' => 6.1,
		                    		      'three' => 7.4,
		                    		      'four' => 8.5,
		                    		      'five' => 9.2,
		                    		      'six' => 9.5,
		                    		      'seven' => 10,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.60,
		                    		      'two' => 0.60,
		                    		      'three' => 0.70,
		                    		      'four' => 0.90,
		                    		      'five' => 0.80,
		                    		      'six' => 1.00,
		                    		      'seven' => 1.10,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for 7 rank
		 */

		$ranks = array('rank_no' =>7,
		                    'rankname' => 'ORGANIZER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 6.1,
		                    		      'two' => 6.7,
		                    		      'three' => 8.1,
		                    		      'four' => 9.4,
		                    		      'five' => 10,
		                    		      'six' => 10.4,
		                    		      'seven' => 11,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.60,
		                    		      'two' => 0.60,
		                    		      'three' => 0.70,
		                    		      'four' => 0.90,
		                    		      'five' => 0.80,
		                    		      'six' => 0.90,
		                    		      'seven' => 1.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		       'one' => 6.1,
		                    		      'two' => 6.7,
		                    		      'three' => 8.1,
		                    		      'four' => 9.4,
		                    		      'five' => 10,
		                    		      'six' => 10.4,
		                    		      'seven' => 11,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.60,
		                    		      'two' => 0.60,
		                    		      'three' => 0.70,
		                    		      'four' => 0.90,
		                    		      'five' => 0.80,
		                    		      'six' => 0.90,
		                    		      'seven' => 1.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for eight rank
		 */

		$ranks = array('rank_no' =>8,
		                    'rankname' => 'SR. ORGANIZER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 6.6,
		                    		      'two' => 7.2,
		                    		      'three' => 8.7,
		                    		      'four' => 10.2,
		                    		      'five' => 10.8,
		                    		      'six' => 11.2,
		                    		      'seven' => 12,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.50,
		                    		      'two' => 0.50,
		                    		      'three' => 0.60,
		                    		      'four' => 0.80,
		                    		      'five' => 0.80,
		                    		      'six' => 0.80,
		                    		      'seven' => 1.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		       'one' => 6.6,
		                    		      'two' => 7.2,
		                    		      'three' => 8.7,
		                    		      'four' => 10.2,
		                    		      'five' => 10.8,
		                    		      'six' => 11.2,
		                    		      'seven' => 12,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.50,
		                    		      'two' => 0.50,
		                    		      'three' => 0.60,
		                    		      'four' => 0.80,
		                    		      'five' => 0.80,
		                    		      'six' => 0.80,
		                    		      'seven' => 1.00,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for ninth rank
		 */

		$ranks = array('rank_no' =>9,
		                    'rankname' => 'MARKETING OFFICER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 7,
		                    		      'two' => 7.7,
		                    		      'three' => 9.2,
		                    		      'four' => 11,
		                    		      'five' => 11.5,
		                    		      'six' => 12,
		                    		      'seven' => 12.90,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.40,
		                    		      'two' => 0.50,
		                    		      'three' => 0.50,
		                    		      'four' => 0.80,
		                    		      'five' => 0.70,
		                    		      'six' => 0.80,
		                    		      'seven' => 0.90,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		       'one' => 7,
		                    		      'two' => 7.7,
		                    		      'three' => 9.2,
		                    		      'four' => 11,
		                    		      'five' => 11.5,
		                    		      'six' => 12,
		                    		      'seven' => 12.90,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.40,
		                    		      'two' => 0.50,
		                    		      'three' => 0.50,
		                    		      'four' => 0.80,
		                    		      'five' => 0.70,
		                    		      'six' => 0.80,
		                    		      'seven' => 0.90,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for tenth rank
		 */

		$ranks = array('rank_no' =>10,
		                    'rankname' => 'SR. MARKETING OFFICER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										'one' => 7.4,
		                    		      'two' => 8.2,
		                    		      'three' => 9.7,
		                    		      'four' => 11.7,
		                    		      'five' => 12.2,
		                    		      'six' => 12.8,
		                    		      'seven' => 13.8,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.40,
		                    		      'two' => 0.50,
		                    		      'three' => 0.50,
		                    		      'four' => 0.70,
		                    		      'five' => 0.70,
		                    		      'six' => 0.80,
		                    		      'seven' => 0.90,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 7.4,
		                    		      'two' => 8.2,
		                    		      'three' => 9.7,
		                    		      'four' => 11.7,
		                    		      'five' => 12.2,
		                    		      'six' => 12.8,
		                    		      'seven' => 13.8,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.40,
		                    		      'two' => 0.50,
		                    		      'three' => 0.50,
		                    		      'four' => 0.70,
		                    		      'five' => 0.70,
		                    		      'six' => 0.80,
		                    		      'seven' => 0.90,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		/**
		 * for eleventh rank
		 */

		$ranks = array('rank_no' =>11,
		                    'rankname' => 'REGIONAL MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										'one' => 7.75,
		                    		      'two' => 8.6,
		                    		      'three' => 10.15,
		                    		      'four' => 12.30,
		                    		      'five' => 12.80,
		                    		      'six' => 13.55,
		                    		      'seven' => 14.60,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.35,
		                    		      'two' => 0.40,
		                    		      'three' => 0.45,
		                    		      'four' => 0.60,
		                    		      'five' => 0.60,
		                    		      'six' => 0.75,
		                    		      'seven' => 0.80,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 7.75,
		                    		      'two' => 8.6,
		                    		      'three' => 10.15,
		                    		      'four' => 12.30,
		                    		      'five' => 12.80,
		                    		      'six' => 13.55,
		                    		      'seven' => 14.60,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.35,
		                    		      'two' => 0.40,
		                    		      'three' => 0.45,
		                    		      'four' => 0.60,
		                    		      'five' => 0.60,
		                    		      'six' => 0.75,
		                    		      'seven' => 0.80,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for twelfth rank
		 */

		$ranks = array('rank_no' =>12,
		                    'rankname' => 'SR. REGIONAL MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										'one' => 8.1,
		                    		      'two' => 9,
		                    		      'three' => 10.6,
		                    		      'four' => 12.9,
		                    		      'five' => 13.4,
		                    		      'six' => 14.3,
		                    		      'seven' => 15.4,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.35,
		                    		      'two' => 0.40,
		                    		      'three' => 0.45,
		                    		      'four' => 0.60,
		                    		      'five' => 0.60,
		                    		      'six' => 0.75,
		                    		      'seven' => 0.80,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 8.1,
		                    		      'two' => 9,
		                    		      'three' => 10.6,
		                    		      'four' => 12.9,
		                    		      'five' => 13.4,
		                    		      'six' => 14.3,
		                    		      'seven' => 15.4,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.35,
		                    		      'two' => 0.40,
		                    		      'three' => 0.45,
		                    		      'four' => 0.60,
		                    		      'five' => 0.60,
		                    		      'six' => 0.75,
		                    		      'seven' => 0.80,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for thirteenth rank
		 */

		$ranks = array('rank_no' =>13,
		                    'rankname' => 'ZONAL MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 8.35,
		                    		      'two' => 9.30,
		                    		      'three' => 11,
		                    		      'four' => 13.5,
		                    		      'five' => 14,
		                    		      'six' => 15,
		                    		      'seven' => 16.1,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.25,
		                    		      'two' => 0.30,
		                    		      'three' => 0.40,
		                    		      'four' => 0.60,
		                    		      'five' => 0.60,
		                    		      'six' => 0.70,
		                    		      'seven' => 0.70,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 8.35,
		                    		      'two' => 9.30,
		                    		      'three' => 11,
		                    		      'four' => 13.5,
		                    		      'five' => 14,
		                    		      'six' => 15,
		                    		      'seven' => 16.1,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.25,
		                    		      'two' => 0.30,
		                    		      'three' => 0.40,
		                    		      'four' => 0.60,
		                    		      'five' => 0.60,
		                    		      'six' => 0.70,
		                    		      'seven' => 0.70,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for fourteenth rank
		 */

		$ranks = array('rank_no' =>14,
		                    'rankname' => 'SR.ZONAL MANAGER',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 8.6,
		                    		      'two' => 9.6,
		                    		      'three' => 11.4,
		                    		      'four' => 14,
		                    		      'five' => 15,
		                    		      'six' => 16.30,
		                    		      'seven' => 17,
					                      'rank_id' => $id
					                    )
					            	);
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		       'one' => 0.25,
		                    		      'two' => 0.30,
		                    		      'three' => 0.40,
		                    		      'four' => 0.50,
		                    		      'five' => 1.0,
		                    		      'six' => 1.3,
		                    		      'seven' => 0.9,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		
		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 8.6,
		                    		      'two' => 9.6,
		                    		      'three' => 11.4,
		                    		      'four' => 14,
		                    		      'five' => 15,
		                    		      'six' => 16.30,
		                    		      'seven' => 17,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.25,
		                    		      'two' => 0.30,
		                    		      'three' => 0.40,
		                    		      'four' => 0.50,
		                    		      'five' => 1.0,
		                    		      'six' => 1.3,
		                    		      'seven' => 0.9,
		                    		      'rank_id' => $id
		                    		      )
		                             );
		

		/**
		 * for fifteenth rank
		 */

		$ranks = array('rank_no' =>15,
		                    'rankname' => 'EXECUTIVE',
		                    'created_at' => $now,
		         	        'updated_at' => $now);

		// Uncomment the below to run the seeder
		$id = DB::table('ranks')->insertGetId($ranks);
		Rank::find($id)->fd_self_commision()->insert(
					                 array(
										 'one' => 8.8,
		                    		      'two' => 9.8,
		                    		      'three' => 11.7,
		                    		      'four' => 14.5,
		                    		      'five' => 16,
		                    		      'six' => 18,
		                    		      'seven' => 19,
					                      'rank_id' => $id
					                    )
					                 );
		Rank::find($id)->fd_team_commision()->insert(
		                             array(
		                    		      'one' => 0.20,
		                    		      'two' => 0.20,
		                    		      'three' => 0.30,
		                    		      'four' => 0.50,
		                    		      'five' => 1.0,
		                    		      'six' => 1.7,
		                    		      'seven' => 2.0,
		                    		      'rank_id' => $id
		                    		      )
		                             );

		Rank::find($id)->rd_self_commision()->insert(
			                             array(
		                    		      'one' => 8.8,
		                    		      'two' => 9.8,
		                    		      'three' => 11.7,
		                    		      'four' => 14.5,
		                    		      'five' => 16,
		                    		      'six' => 18,
		                    		      'seven' => 19,
			                    		   'rank_id' => $id
			                    		      )
			                          );
		Rank::find($id)->rd_team_commision()->insert(
		                             array(
		                    		     'one' => 0.20,
		                    		      'two' => 0.20,
		                    		      'three' => 0.30,
		                    		      'four' => 0.50,
		                    		      'five' => 1.0,
		                    		      'six' => 1.7,
		                    		      'seven' => 2.0,
		                    		      'rank_id' => $id
		                    		      )
		                             );



	}

}

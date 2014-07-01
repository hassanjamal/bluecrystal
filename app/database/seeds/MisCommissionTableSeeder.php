<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MisCommissionTableSeeder extends Seeder {

	public function run()
	{


		// rank 1

		$id = Rank::where('rank_no', '1')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);


		// rank 2

		$id = Rank::where('rank_no', '2')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		// rank 3

		$id = Rank::where('rank_no', '3')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		// rank 4

		$id = Rank::where('rank_no', '4')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		// rank 5

		$id = Rank::where('rank_no', '5')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		// rank 6

		$id = Rank::where('rank_no', '6')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		// rank 7

		$id = Rank::where('rank_no', '7')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);


		// rank 8

		$id = Rank::where('rank_no', '8')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);


		// rank 9

		$id = Rank::where('rank_no', '9')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		// rank 10

		$id = Rank::where('rank_no', '10')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		// rank 11

		$id = Rank::where('rank_no', '11')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		// rank 12

		$id = Rank::where('rank_no', '12')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);
		// rank 13

		$id = Rank::where('rank_no', '13')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		// rank 14

		$id = Rank::where('rank_no', '14')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);
		// rank 15

		$id = Rank::where('rank_no', '15')->pluck('id');

		Rank::find($id)->mis_self_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);

		Rank::find($id)->mis_team_commission()->insert(
					                 array(
					                      'one'     => 2,
		                    		      'two'   => 2.5,
		                    		      'three' => 3,
		                    		      'four'  => 4,
		                    		      'five'  => 4.1,
		                    		      'six'	  =>4.5,
					                      'rank_id' => $id
					                    )
					            	);
	}

}
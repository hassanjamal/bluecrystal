<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$user = Sentry::findUserByLogin('super.admin@bluecrystalgroup.in');
		$user->password = "hello";
		$user->save();
		// $this->call('RanksTableSeeder');
		// $this->call('BranchTableSeeder');
		// $this->call('SentryGroupSeeder');
		// $this->call('SentryUserGroupSeeder');
		// $this->call('RdschemesTableSeeder');
		// $this->call('FdschemesTableSeeder');
		// $this->call('SchemeamountTableSeeder');
		// $this->call('SpecialCaseTableSeeder');
		// $this->call('AssociatesTableSeeder');


		// $this->call('MisschemesTableSeeder');
		// $this->call('MisCommissionTableSeeder');
	}

}

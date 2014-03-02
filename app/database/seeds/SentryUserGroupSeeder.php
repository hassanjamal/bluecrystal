<?php

class SentryUserGroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users_groups')->delete();

		$PatnaBranchAdminUser = Sentry::getUserProvider()->findByLogin('patna.admin@bluecrystalgroup.in');
		// Super Admin
		$AdminUser = Sentry::getUserProvider()->findByLogin('admin@bluecrystalgroup.in');

		// $UserGroup     = Sentry::getGroupProvider()->findByName('Branch-User');
		$BranchAdminGroup = Sentry::getGroupProvider()->findByName('Branch-Admin');
		$SuperAdminGroup  = Sentry::getGroupProvider()->findByName('SuperUser');

	    // Assign the groups to the users
	    $PatnaBranchAdminUser->addGroup($BranchAdminGroup);
		// Super Admin
	    $AdminUser->addGroup($SuperAdminGroup);
	}

}

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

        // Branch User
        $ManuParmarPatnaUser = Sentry::getUserProvider()->findByLogin('manu.parmar@bluecrystalgroup.in');
        // Branch Admin
		$LucknowBranchAdminUser     = Sentry::getUserProvider()->findByLogin('lucknow.admin@bluecrystalgroup.in');
		$AllahabadBranchAdminUser   = Sentry::getUserProvider()->findByLogin('allahabad.admin@bluecrystalgroup.in');
		$VaranasiBranchAdminUser    = Sentry::getUserProvider()->findByLogin('varanasi.admin@bluecrystalgroup.in');
		$NewdelhiBranchAdminUser    = Sentry::getUserProvider()->findByLogin('newdelhi.admin@bluecrystalgroup.in');
		$PatnaBranchAdminUser       = Sentry::getUserProvider()->findByLogin('patna.admin@bluecrystalgroup.in');
		$ArrahBranchAdminUser       = Sentry::getUserProvider()->findByLogin('arrah.admin@bluecrystalgroup.in');
		$MuzaffarpurBranchAdminUser = Sentry::getUserProvider()->findByLogin('muzaffarpur.admin@bluecrystalgroup.in');
		$BiharsharifBranchAdminUser = Sentry::getUserProvider()->findByLogin('biharsharif.admin@bluecrystalgroup.in');
		// Super Admin
		$AdminUser = Sentry::getUserProvider()->findByLogin('super.admin@bluecrystalgroup.in');

		// Get User Type
		$BranchAdminGroup = Sentry::getGroupProvider()->findByName('Branch-Admin');
		$BranchUserGroup  = Sentry::getGroupProvider()->findByName('Branch-User');
		$SuperAdminGroup  = Sentry::getGroupProvider()->findByName('SuperUser');

	    // Assign the groups to the Branch User
        $ManuParmarPatnaUser->addGroup($BranchUserGroup);
	    // Assign the groups to the Branch Admin
		$LucknowBranchAdminUser->addGroup($BranchAdminGroup);
		$AllahabadBranchAdminUser->addGroup($BranchAdminGroup);
		$VaranasiBranchAdminUser->addGroup($BranchAdminGroup);
		$NewdelhiBranchAdminUser->addGroup($BranchAdminGroup);
		$PatnaBranchAdminUser->addGroup($BranchAdminGroup);
		$ArrahBranchAdminUser->addGroup($BranchAdminGroup);
		$MuzaffarpurBranchAdminUser->addGroup($BranchAdminGroup);
		$BiharsharifBranchAdminUser->addGroup($BranchAdminGroup);
		// Super Admin
	    $AdminUser->addGroup($SuperAdminGroup);
	}

}

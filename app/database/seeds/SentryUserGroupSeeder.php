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

		$LucknowBranchAdmin = Sentry::getUserProvider()->findByLogin('lucknow.admin@bluecrystalgroup.in');
		$AllahabadBranchAdmin = Sentry::getUserProvider()->findByLogin('allahabad.admin@bluecrystalgroup.in');
		$VaranasiBranchAdmin = Sentry::getUserProvider()->findByLogin('varanasi.admin@bluecrystalgroup.in');
		$NewDelhiBranchAdmin = Sentry::getUserProvider()->findByLogin('newdelhi.admin@bluecrystalgroup.in');
		$PatnaBranchAdmin = Sentry::getUserProvider()->findByLogin('patna.admin@bluecrystalgroup.in');
		$ArrahBranchAdmin = Sentry::getUserProvider()->findByLogin('arrah.admin@bluecrystalgroup.in');
		$MuzaffarpurBranchAdmin = Sentry::getUserProvider()->findByLogin('muzaffarpur.admin@bluecrystalgroup.in');
		$BiharsharifBranchAdmin = Sentry::getUserProvider()->findByLogin('biharsharif.admin@bluecrystalgroup.in');

        //Patna Branch User


		$ManuParmar = Sentry::getUserProvider()->findByLogin('manu.parmar@bluecrystalgroup.in');
		// Super Admin
		$SuperAdmin = Sentry::getUserProvider()->findByLogin('super.admin@bluecrystalgroup.in');

		// $UserGroup = Sentry::getGroupProvider()->findByName('Branch-User');
		$BranchUserGroup = Sentry::getGroupProvider()->findByName('Branch-User');
		$BranchAdminGroup = Sentry::getGroupProvider()->findByName('Branch-Admin');
		$SuperAdminGroup = Sentry::getGroupProvider()->findByName('SuperUser');

	    // Assign the groups to the users
	    $LucknowBranchAdmin->addGroup($BranchAdminGroup);
	    $VaranasiBranchAdmin->addGroup($BranchAdminGroup);
	    $AllahabadBranchAdmin->addGroup($BranchAdminGroup);
	    $NewDelhiBranchAdmin->addGroup($BranchAdminGroup);
	    $PatnaBranchAdmin->addGroup($BranchAdminGroup);
	    $ArrahBranchAdmin->addGroup($BranchAdminGroup);
	    $MuzaffarpurBranchAdmin->addGroup($BranchAdminGroup);
	    $BiharsharifBranchAdmin->addGroup($BranchAdminGroup);
		
        //Patna Branch User 

	    $ManuParmar->addGroup($BranchUserGroup);
		// Super Admin
	    $SuperAdmin->addGroup($SuperAdminGroup);
	}

}

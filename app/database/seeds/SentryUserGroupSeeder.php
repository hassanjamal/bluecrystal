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

		$PatnaBranchAdminUser = Sentry::getUserProvider()->findByLogin('patna.admin@sanskarnidhi.in');
		$NawadaBranchAdminUser = Sentry::getUserProvider()->findByLogin('nawada.admin@sanskarnidhi.in');
		$SheikhpuraBranchAdminUser = Sentry::getUserProvider()->findByLogin('sheikhpura.admin@sanskarnidhi.in');
		$JamshedpurBranchAdminUser = Sentry::getUserProvider()->findByLogin('Jamshedpur.admin@sanskarnidhi.in');
		$MadhupurBranchAdminUser = Sentry::getUserProvider()->findByLogin('madhupur.admin@sanskarnidhi.in');
		$DeogharBranchAdminUser = Sentry::getUserProvider()->findByLogin('deoghar.admin@sanskarnidhi.in');
		$JamataraBranchAdminUser = Sentry::getUserProvider()->findByLogin('jamatara.admin@sanskarnidhi.in');
		$RajauliBranchAdminUser = Sentry::getUserProvider()->findByLogin('rajauli.admin@sanskarnidhi.in');
		$LakhisaraiBranchAdminUser = Sentry::getUserProvider()->findByLogin('lakhisarai.admin@sanskarnidhi.in');
		$BegusaraiBranchAdminUser = Sentry::getUserProvider()->findByLogin('begusarai.admin@sanskarnidhi.in');
		$RanchiBranchAdminUser = Sentry::getUserProvider()->findByLogin('ranchi.admin@sanskarnidhi.in');
		$JalpaiguriBranchAdminUser = Sentry::getUserProvider()->findByLogin('jalpaiguri.admin@sanskarnidhi.in');
		$DachinaBranchAdminUser = Sentry::getUserProvider()->findByLogin('dachina.admin@sanskarnidhi.in');

		// Super Admin
		$AdminUser = Sentry::getUserProvider()->findByLogin('admin@sanskarnidhi.in');

		// $UserGroup = Sentry::getGroupProvider()->findByName('Branch-User');
		$BranchAdminGroup = Sentry::getGroupProvider()->findByName('Branch-Admin');
		$SuperAdminGroup = Sentry::getGroupProvider()->findByName('SuperUser');

	    // Assign the groups to the users
	    $PatnaBranchAdminUser->addGroup($BranchAdminGroup);
		$NawadaBranchAdminUser->addGroup($BranchAdminGroup);
		$SheikhpuraBranchAdminUser->addGroup($BranchAdminGroup);
		$JamshedpurBranchAdminUser->addGroup($BranchAdminGroup);
		$MadhupurBranchAdminUser->addGroup($BranchAdminGroup);
		$DeogharBranchAdminUser->addGroup($BranchAdminGroup);
		$JamataraBranchAdminUser->addGroup($BranchAdminGroup);
		$RajauliBranchAdminUser->addGroup($BranchAdminGroup);
		$LakhisaraiBranchAdminUser->addGroup($BranchAdminGroup);
		$BegusaraiBranchAdminUser->addGroup($BranchAdminGroup);
		$RanchiBranchAdminUser->addGroup($BranchAdminGroup);
        $JalpaiguriBranchAdminUser->addGroup($BranchAdminGroup);
        $DachinaBranchAdminUser->addGroup($BranchAdminGroup);
		
		// Super Admin
	    $AdminUser->addGroup($SuperAdminGroup);
	}

}

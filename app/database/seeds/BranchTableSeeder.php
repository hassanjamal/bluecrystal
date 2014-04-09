<?php

class BranchTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('branches')->truncate();
        $now= date('Y-m-d H:i:s');
        /**
         * HEAD QUARTER
         */
        $branch = array(
            'name'         => 'HEADQUARTER',
            'address'      => 'C-401, City Tower Sector -15 , CBD Belapur , Opp- Nimantran Restaurant , Navi Mumbai',
            'city'         => 'Mumbai',
            'state'        => 'Maharastra',
            'pincode'      => '400416',
            'managername'  => 'Head Manager',
            'managerphone' => '9876543210',
            'email'        => 'superadmin@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at' => $now
        );
        $id = DB::table('branches')->insertGetId($branch);

        Sentry::getUserProvider()->create(array(
            'email'      => 'super.admin@bluecrystalgroup.in',
            'password'   => '@@Blue123#@',
            'activated'  => 1,
            'first_name' => 'Super',
            'last_name'  => 'Admin',
            'branch_id'  => $id
        ));
        $rank_id = Rank::where('rank_no',99999)->pluck('id');
        $associate = array(
            'associate_no'  => 'COMPANY',
            'name'          => 'COMPANY',
            'branch_id'     => $id,
            'introducer_id' => $rank_id,
            'rank_id'       => $rank_id,
            'start_date'    => $now,
            'activate'      => '1',
            'company'       => TRUE,
        );
        DB::table('associates')->insert($associate);

        /**
         *  Lucknow Branch
         */

        $branch = array(
            'name'         => 'LUCKNOW_01',
            'address'      => '',
            'city'         => 'LUCKNOW',
            'state'        => 'UTTAR PRADESH',
            'pincode'      => '',
            'managername'  => 'Lucknow Manager',
            'managerphone' => '9876543210',
            'email'        => 'lucknow.manager@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at'   => $now
        );
        $id = DB::table('branches')->insertGetId($branch);

        Sentry::getUserProvider()->create(array(
            'email'      => 'lucknow.admin@bluecrystalgroup.in',
            'password'   => 'admin123',
            'activated'  => 1,
            'first_name' => 'lucknow',
            'last_name'  => 'Admin',
            'branch_id'  => $id

        ));

        /**
         *  Allahabad Branch
         */

        $branch = array(
            'name'         => 'ALLAHABAD_01',
            'address'      => '',
            'city'         => 'ALLAHABAD',
            'state'        => 'UTTAR PRADESH',
            'pincode'      => '',
            'managername'  => 'Allahabad Manager',
            'managerphone' => '9876543210',
            'email'        => 'allahabad.manager@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at'   => $now
        );
        $id = DB::table('branches')->insertGetId($branch);

        Sentry::getUserProvider()->create(array(
            'email'      => 'allahabad.admin@bluecrystalgroup.in',
            'password'   => 'admin123',
            'activated'  => 1,
            'first_name' => 'Allahabad',
            'last_name'  => 'Admin',
            'branch_id'  => $id
        ));

        /**
         *  Varanasi Branch
         */

        $branch = array(
            'name'         => 'VARANASI_01',
            'address'      => '',
            'city'         => 'VARANASI',
            'state'        => 'UTTAR PRADESH',
            'pincode'      => 'BranchTableSeeder.php',
            'managername'  => 'Varanasi Manager',
            'managerphone' => '9876543210',
            'email'        => 'varanasi.manager@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at'   => $now
        );
        $id = DB::table('branches')->insertGetId($branch);

        Sentry::getUserProvider()->create(array(
            'email'      => 'varanasi.admin@bluecrystalgroup.in',
            'password'   => 'admin123',
            'activated'  => 1,
            'first_name' => 'Varanasi',
            'last_name'  => 'Admin',
            'branch_id'  => $id
        ));

        /**
         *  Newdelhi Branch
         */

        $branch = array(
            'name'         => 'NEWDELHI_01',
            'address'      => '',
            'city'         => 'NEW DELHI',
            'state'        => 'NEW DELHI',
            'pincode'      => '',
            'managername'  => 'New Delhi Manager',
            'managerphone' => '9876543210',
            'email'        => 'newdelhi.manager@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at'   => $now
        );
        $id = DB::table('branches')->insertGetId($branch);

        Sentry::getUserProvider()->create(array(
            'email'      => 'newdelhi.admin@bluecrystalgroup.in',
            'password'   => 'admin123',
            'activated'  => 1,
            'first_name' => 'New Delhi',
            'last_name'  => 'Admin',
            'branch_id'  => $id
        ));

        /**
         *  Patna Branch
         */

        $branch = array(
            'name'         => 'PATNA_01',
            'address'      => 'Birat Complex, Boring Road ',
            'city'         => 'PATNA',
            'state'        => 'BIHAR',
            'pincode'      => '800013',
            'managername'  => 'Patna Manager',
            'managerphone' => '9876543210',
            'email'        => 'patna.manager@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at'   => $now
        );
        $id = DB::table('branches')->insertGetId($branch);

        Sentry::getUserProvider()->create(array(
            'email'      => 'patna.admin@bluecrystalgroup.in',
            'password'   => 'admin123',
            'activated'  => 1,
            'first_name' => 'Patna',
            'last_name'  => 'Admin',
            'branch_id'  => $id
        ));

        Sentry::getUserProvider()->create(array(
            'email'      => 'manu.parmar@bluecrystalgroup.in',
            'password'   => '$$manu1234$$',
            'activated'  => 1,
            'first_name' => 'Manu',
            'last_name'  => 'Parmar',
            'branch_id'  => $id
        ));

        /**
         *  Arrah Branch
         */

        $branch = array(
            'name'         => 'ARRAH_01',
            'address'      => '',
            'city'         => 'ARRAH',
            'state'        => 'BIHAR',
            'pincode'      => '',
            'managername'  => 'Arrah Manager',
            'managerphone' => '9876543210',
            'email'        => 'arrah.manager@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at'   => $now
        );
        $id = DB::table('branches')->insertGetId($branch);

        Sentry::getUserProvider()->create(array(
            'email'      => 'arrah.admin@bluecrystalgroup.in',
            'password'   => 'admin123',
            'activated'  => 1,
            'first_name' => 'Arrah',
            'last_name'  => 'Admin',
            'branch_id'  => $id
        ));

        /**
         *  Muzaffarpur Branch
         */

        $branch = array(
            'name'         => 'MUZAFFARPUR_01',
            'address'      => '',
            'city'         => 'MUZAFFARPUR',
            'state'        => 'BIHAR',
            'pincode'      => '',
            'managername'  => 'Muzaffarpur Manager',
            'managerphone' => '9876543210',
            'email'        => 'muzaffarpur.manager@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at'   => $now
        );
        $id = DB::table('branches')->insertGetId($branch);

        Sentry::getUserProvider()->create(array(
            'email'      => 'muzaffarpur.admin@bluecrystalgroup.in',
            'password'   => 'admin123',
            'activated'  => 1,
            'first_name' => 'Muzaffarpur',
            'last_name'  => 'Admin',
            'branch_id'  => $id
        ));

        /**
         *  Biharsharif Branch
         */

        $branch = array(
            'name'         => 'BIHARSHARIF_01',
            'address'      => '',
            'city'         => 'BIHARSHARIF',
            'state'        => 'BIHAR',
            'pincode'      => '',
            'managername'  => 'Biharsharif Manager',
            'managerphone' => '9876543210',
            'email'        => 'biharsharif.manager@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at'   => $now
        );
        $id = DB::table('branches')->insertGetId($branch);

        Sentry::getUserProvider()->create(array(
            'email'      => 'biharsharif.admin@bluecrystalgroup.in',
            'password'   => 'admin123',
            'activated'  => 1,
            'first_name' => 'Biharsharif',
            'last_name'  => 'Admin',
            'branch_id'  => $id
        ));



    }    // end of public function run to execute seeder 
} // end of class

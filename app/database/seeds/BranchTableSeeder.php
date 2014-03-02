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
            'address'      => 'Fraser Road',
            'city'         => 'Patna',
            'state'        => 'Bihar',
            'pincode'      => '800001',
            'managername'  => 'Head Manager',
            'managerphone' => '9876543210',
            'email'        => 'email@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at' => $now
        );
        $id = DB::table('branches')->insertGetId($branch);

        Sentry::getUserProvider()->create(array(
            'email'      => 'admin@bluecrystalgroup.in',
            'password'   => 'admin123',
            'activated'  => 1,
            'first_name' => 'Super',
            'last_name'  => 'Admin',
            'branch_id'  => $id
        ));
        $rank_id = Rank::where('rank_no',99999)->pluck('id');
        $associate = array(
            'associate_no' => 'COMPANY',
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
         *  First Branch
         */

        $branch = array(
            'name'         => 'PATNA_01',
            'address'      => 'Office No:-9, Dev Sindhi Plaza Ground Floor, Kankarbagh Main Road',
            'city'         => 'Patna',
            'state'        => 'Bihar',
            'pincode'      => '800020',
            'managername'  => 'manager',
            'managerphone' => '9876543210',
            'email'        => 'manager@bluecrystalgroup.in',
            'phone'        => '9876543210',
            'created_at'   => $now,
            'updated_at' => $now
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

        // Sentry::getUserProvider()->create(array(
        //     'email'    => 'patuser@surakshaujjawalnidhi.com',
        //     'password' => 'user123',
        //     'activated' => 1,
        //    	'first_name' => 'Patna',
        //     'last_name' => 'User',
        //     'branch_id' => $id

        // ));

    }    // end of public function run to execute seeder 
} // end of class

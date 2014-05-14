<?php
class SpecialCaseTableSeeder extends Seeder
{

    public function run()
    {
        $now           = date('Y-m-d H:i:s');
        $special_cases = array(
            array(
                'special_case' => 'NONE',
                'created_at'   => $now,
                'updated_at'   => $now,
            ),
            array(
                'special_case' => 'SENIOR CITIZEN',
                'created_at'   => $now,
                'updated_at'   => $now,
            ),
            array(
                'special_case' => 'WOMEN',
                'created_at'   => $now,
                'updated_at'   => $now,
            ),
            array(
                'special_case' => 'GOVT EMPLOYEE',
                'created_at'   => $now,
                'updated_at'   => $now,
            ),
            array(
                'special_case' => 'DEFENCE PERSONNEL',
                'created_at'   => $now,
                'updated_at'   => $now,
            ),
            array(
                'special_case' => 'PHYSICALLY HANDICAPPED',
                'created_at'   => $now,
                'updated_at'   => $now,
            ),
            array(
                'special_case' => 'GOVT PENSIONER',
                'created_at'   => $now,
                'updated_at'   => $now,
            ),
            array(
                'special_case' => 'WINDOWS OF MATYRS',
                'created_at'   => $now,
                'updated_at'   => $now,
            ),
        );

        DB::table('special_case')->insert($special_cases);
    }

}

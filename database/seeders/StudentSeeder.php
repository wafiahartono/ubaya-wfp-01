<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'nrp' => '160419084',
            'name' => 'Amirullah Achmad Nassardhi'
        ]);

        DB::table('students')->insert([
            'nrp' => '160419098',
            'name' => 'Wafi Azmi Hartono'
        ]);

        DB::table('students')->insert([
            'nrp' => '160419112',
            'name' => 'Yudhistira Anggara Jayadinata'
        ]);
    }
}

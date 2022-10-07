<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::create([
            'nrp' => '160419084',
            'name' => 'Amirullah Achmad Nassardhi'
        ]);

        Student::create([
            'nrp' => '160419098',
            'name' => 'Wafi Azmi Hartono'
        ]);

        Student::create([
            'nrp' => '160419112',
            'name' => 'Yudhistira Anggara Jayadinata'
        ]);
    }
}

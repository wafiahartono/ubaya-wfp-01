<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Student::create(['nrp' => '160419084', 'name' => 'Amirullah Achmad Nassardhi']);
        Student::create(['nrp' => '160419098', 'name' => 'Wafi Azmi Hartono']);
        Student::create(['nrp' => '160419112', 'name' => 'Yudhistira Anggara Jayadinata']);

        for ($i = 0; $i < 10; $i++) {
            Category::factory()->hasProducts(rand(3, 5))->create();
        }

//        $roles = Role::factory()->count(3)->create();
//        User::factory()->has(Role::factory()->count(rand(1, 3)))->count(10)->create();

//        foreach ($users as $user) {
//
//        }
    }
}

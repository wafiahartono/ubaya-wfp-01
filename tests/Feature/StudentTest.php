<?php

namespace Tests\Unit;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function test_ensure_data_can_be_inserted()
    {
        $student = Student::factory()->create();
        $student->save();
        $this->assertDatabaseHas('students', ['nrp' => '']);
    }

    public function test_ensure_data_can_be_deleted()
    {
        $student = Student::factory()->create();
        $student->save();
        $this->assertDatabaseHas('students', ['nrp' =>$student->nrp]);
        $student->delete();
        $this->assertDatabaseMissing('students', ['nrp' =>$student->nrp]);
    }
}

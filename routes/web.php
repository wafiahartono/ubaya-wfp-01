<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return view('welcome', ['name' => 'Wafi']);
});

global $students;

$students = [
    (object) [
        'nrp' => '160419098',
        'name' => 'Wafi Azmi Hartono',
        'pob' => 'Jombang, Jawa Timur',
        'hobbies' => ['Sleeping', 'Daydreaming']
    ],
    (object) [
        'nrp' => '160419084',
        'name' => 'AMIRULLAH ACHMAD NASSARDHI',
        'pob' => 'Lamongan, Jawa Timur',
        'hobbies' => ['Partying']
    ],
    (object) [
        'nrp' => '160419112',
        'name' => 'YUDHISTIRA ANGGARA JAYADINATA',
        'pob' => 'Bontang, Kalimantan Timur',
        'hobbies' => ['Lifting']
    ],
];

function search_student($nrp) {
    global $students;
    foreach ($students as $student) {
        if ($student->nrp === $nrp) return $student;
    }
    return null;
}

Route::get('/my', function () {
    $student = search_student('160419098');
    return view('student', ['student' => $student]);
});

Route::get('/myfriend/{nrp?}', function ($nrp = null) {
    global $students;
    if ($nrp) {
        $student = search_student($nrp);
        return view('student', ['student' => $student]);
    } else {
        return view('student-list', ['students' => $students]);
    }
})->name('friend');

Route::resource('products', ProductController::class);

<?php

use App\Http\Controllers\ProductController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/greeting', function () {
    return view('welcome', ['name' => 'Wafi']);
});

Route::get('/my', function () {
    $student = Student::firstWhere('nrp', '160419098');
    return view('student.show', compact('student'));
});

Route::get('/myfriend/{nrp?}', function ($nrp = null) {
    if ($nrp) {
        $student = Student::firstWhere('nrp', $nrp);
        return view('student.show', compact('student'));
    } else {
        $students = Student::all();
        return view('student.index', compact('students'));
    }
})->name('friend');

Route::resource('products', ProductController::class);

Route::get('test', function() {
});

<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    //Doctor Routes In Admin
    Route::get('/Instructor', [InstructorController::class, 'index'])->name('Instructor.index');
    Route::get('/Instructor/create', [InstructorController::class, 'create'])->name('Instructor.create');
    Route::post('/Instructor/store', [InstructorController::class, 'store'])->name('Instructor.store');
    Route::get('/Instructor/edit/{instructor}', [InstructorController::class, 'edit'])->name('Instructor.edit');
    Route::put('/Instructor/update/{instructor}', [InstructorController::class, 'update'])->name('Instructor.update');
    Route::delete('/Instructor/destroy/{instructor}', [InstructorController::class, 'destroy'])->name('Instructor.destroy');
    Route::get('/Instructor/subject/{instructor}', [InstructorController::class, 'subject'])->name('Instructor.subject');
    Route::post('/Instructor/storeSubject/{instructor}', [InstructorController::class, 'storeSubject'])->name('Instructor.storeSubject');
    Route::delete('/Instructor/destroySubject/{instructor}/{Subject}', [InstructorController::class, 'destroySubject'])->name('Instructor.destroySubject');
    
    //Doctor Routes In Front 
    Route::get('/Instructor/mySubjects', [DoctorController::class, 'mySubjects'])->name('Instructor.mySubjects');
    Route::get('/Instructor/subjectWeeks/{Subject}', [DoctorController::class, 'subjectWeeks'])->name('Instructor.subjectWeeks');
    Route::get('/Instructor/subjectWeekGroup/{Subject}/{Week}', [DoctorController::class, 'subjectWeekGroup'])->name('Instructor.subjectWeekGroup');
    Route::get('/Instructor/students/{Subject}/{Week}/{Group}', [DoctorController::class, 'students'])->name('Instructor.students');
    Route::post('/Instructor/attendStudents/{Subject}/{Week}/{Group}', [DoctorController::class, 'attendStudents'])->name('Instructor.attendStudents');
    Route::get('/Instructor/printReport/{Subject}', [DoctorController::class, 'printReport'])->name('Instructor.printReport');
    
    
    //Subjects Routes
    Route::get('/Subject', [SubjectController::class, 'index'])->name('Subject.index');
    Route::get('/Subject/create', [SubjectController::class, 'create'])->name('Subject.create');
    Route::post('/Subject/store', [SubjectController::class, 'store'])->name('Subject.store');
    Route::get('/Subject/edit/{Subject}', [SubjectController::class, 'edit'])->name('Subject.edit');
    Route::put('/Subject/update/{Subject}', [SubjectController::class, 'update'])->name('Subject.update');
    Route::delete('/Subject/destroy/{Subject}', [SubjectController::class, 'destroy'])->name('Subject.destroy');
    Route::get('/Subject/week/{Subject}', [SubjectController::class, 'week'])->name('Subject.week');
    Route::post('/Subject/storeWeek/{Subject}', [SubjectController::class, 'storeWeek'])->name('Subject.storeWeek');
    Route::delete('/Subject/destroyWeek/{Subject}/{Week}', [SubjectController::class, 'destroyWeek'])->name('Subject.destroyWeek');
    
    //Groups Routes
    Route::get('/Group', [GroupController::class, 'index'])->name('Group.index');
    Route::get('/Group/create', [GroupController::class, 'create'])->name('Group.create');
    Route::post('/Group/store', [GroupController::class, 'store'])->name('Group.store');
    Route::get('/Group/edit/{Group}', [GroupController::class, 'edit'])->name('Group.edit');
    Route::put('/Group/update/{Group}', [GroupController::class, 'update'])->name('Group.update');
    Route::delete('/Group/destroy/{Group}', [GroupController::class, 'destroy'])->name('Group.destroy');

    //Students Routes
    Route::get('/Student', [StudentController::class, 'index'])->name('Student.index');
    Route::get('/Student/create', [StudentController::class, 'create'])->name('Student.create');
    Route::post('/Student/store', [StudentController::class, 'store'])->name('Student.store');
    Route::get('/Student/edit/{Student}', [StudentController::class, 'edit'])->name('Student.edit');
    Route::put('/Student/update/{Student}', [StudentController::class, 'update'])->name('Student.update');
    Route::delete('/Student/destroy/{Student}', [StudentController::class, 'destroy'])->name('Student.destroy');
    Route::get('/Student/barcode/{Student}', [StudentController::class, 'barcode'])->name('Student.barcode');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

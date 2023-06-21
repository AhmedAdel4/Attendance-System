<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usersCount = User::count();
        $studentsCount = Student::count();
        return view('home', [
            'usersCount' => $usersCount,
            'studentsCount' => $studentsCount
        ]);
    }
}

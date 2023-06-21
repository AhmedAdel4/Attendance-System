<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $Students = Student::paginate(20);
        return view('Student.index',['Students' => $Students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Groups = Group::paginate(20);
        
        return view('Student.create',['Groups' => $Groups]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function barcode($id)
    {
        $Student = Student::find($id);
        return view('Student.info',['Student' => $Student]);
    }

      /**
     * Store a newly created resource in storage.
     */
    public function store(AddStudentRequest $request)
    {
        $data = $request->validated();
        Student::insert($data);
        return redirect(route('Student.index'))->with('success','Data Saved Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Student = Student::find($id);
        $Groups = Group::all();
        return view('Student.edit',['Student' => $Student,'Groups' => $Groups]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddStudentRequest $request, string $id)
    {
        Student::whereId($id)->update($request->validated());
        return redirect(route('Student.index'))->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Student = Student::find($id);
        $Student->delete();
        return redirect(route('Student.index'))->with('success','Data Deleted Successfully');
    }
}

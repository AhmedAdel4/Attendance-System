<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddInstructorRequest;
use App\Http\Requests\StoreInstructorSubjectRequest;
use App\Models\Subject;
use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Instructors = User::where('isAdmin',false)->paginate(20);
        return view('Instructor.index',['Instructors' => $Instructors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titles = Title::all();
        return view('Instructor.create',['titles' => $titles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddInstructorRequest $request)
    {
        $data = $request->validated();
        $data->password = Hash::make($data->password);
        User::insert($data);
        return redirect(route('Instructor.index'))->with('success','Data Saved Successfully');
    }
    
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $titles = Title::all();
        return view('Instructor.edit',['instructor' => $user,'titles' => $titles]);
    }
   
   
 

    /**
     * Update the specified resource in storage.
     */
    public function update(AddInstructorRequest $request, string $id)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::whereId($id)->update($data);
        return redirect(route('Instructor.index'))->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('Instructor.index'))->with('success','Data Deleted Successfully');
    }
    
    public function subject($id)
    {
        $Subjects = Subject::all();
        $user = User::find($id);
        $userSubjects = $user->subjects;
        return view('Instructor.subject',['Subjects' => $Subjects,'user' => $user,'userSubjects' => $userSubjects]);
    }
    
    public function storeSubject(StoreInstructorSubjectRequest $request,$id)
    {
        $data = $request->validated();
        $user = User::find($id);
        $dublicate = $user->subjects()->where('subject_user.subject_id',$data)->first();
        if($dublicate === null)
        {
            $user->subjects()->attach($data);
            return redirect()->back()->with('success','Data Saved Successfully');
        }
        return redirect()->back()->with('warning','Value Already Exisit');
    }
    public function destroySubject($id , $subjectId)
    {
        $user = User::find($id);

        $user->subjects()->detach($subjectId);
        return redirect()->back()->with('success','Data Deleted Successfully');
    }
}

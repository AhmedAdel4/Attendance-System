<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSubjectRequest;
use App\Http\Requests\StoreSubjectWeekRequest;
use App\Models\Subject;
use App\Models\Week;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Subjects = Subject::paginate(20);
        return view('Subject.index',['Subjects' => $Subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSubjectRequest $request)
    {
        $data = $request->validated();
        Subject::insert($data);
        return redirect(route('Subject.index'))->with('success','Data Saved Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('Subject.edit',['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddSubjectRequest $request, $id)
    {
        Subject::whereId($id)->update($request->validated());
        return redirect(route('Subject.index'))->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Subject = Subject::find($id);
        $Subject->delete();
        return redirect(route('Subject.index'))->with('success','Data Deleted Successfully');
    }


    public function week($id)
    {
        $Weeks = Week::all();
        $Subject = Subject::find($id);
        $SubjectWeeks = $Subject->weeks;
        return view('Subject.Week',['Weeks' => $Weeks,'Subject' => $Subject,'SubjectWeeks' => $SubjectWeeks]);
    }
    
    public function storeWeek(StoreSubjectWeekRequest $request,$id)
    {
        $data = $request->validated();
        $Subject = Subject::find($id);
        $dublicate = $Subject->weeks()->where('subject_week.week_id',$data)->first();
        if($dublicate === null)
        {
            $Subject->weeks()->attach($data);
            return redirect()->back()->with('success','Data Saved Successfully');
        }
        return redirect()->back()->with('warning','Value Already Exisit');
    }
    public function destroyWeek($id , $subjectId)
    {
        $Subject = Subject::find($id);

        $Subject->weeks()->detach($subjectId);
        return redirect()->back()->with('success','Data Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendStudentRequest;
use App\Models\Attendance;
use App\Models\Barcode;
use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DoctorController extends Controller
{

    public function mySubjects()
    {
        $user = auth()->user();
        $subjects = $user->subjects;
        return view('Instructor.front.mySubjects', ['subjects' => $subjects]);
    }

    public function subjectWeeks($id)
    {
        $user = auth()->user();
        $subject = $user->subjects->where('id', $id)->first();
        $subjectWeeks = $subject->weeks()->orderBy('order')->get();
        return view('Instructor.front.subjectWeeks', ['subject' => $subject, 'subjectWeeks' => $subjectWeeks]);
    }

    public function subjectWeekGroup($subjectId, $weekId)
    {
        $user = auth()->user();
        $subject = $user->subjects->where('id', $subjectId)->first();
        $subjectWeek = $subject->weeks->where('id', $weekId)->first();
        $groups = Group::all();

        return view('Instructor.front.groups', ['groups' => $groups, 'subject' => $subject, 'subjectWeek' => $subjectWeek]);
    }
    public function students($subjectId, $weekId, $groupId)
    {
        $user = auth()->user();
        $StudentIds = Attendance::where('subject_id', $subjectId)
            ->where('week_id', $weekId)
            ->where('group_id', $groupId)
            ->where('user_id', $user->id)
            ->select('student_id')
            ->get()->toArray();

        $Students = Student::whereIn('id', $StudentIds)->where('group_id', $groupId)->get();

        // return view('Instructor.front.groups', ['groups' => $groups, 'subject' => $subject, 'subjectWeek' => $subjectWeek]);
        return view('Instructor.front.Student', [
            'subjectId' => $subjectId,
            'weekId' => $weekId,
            'groupId' => $groupId,
            'Students' => $Students,
        ]);
    }

    public function attendStudents(AttendStudentRequest $request, $subjectId, $weekId, $groupId)
    {
        $barcode = $request->validated();

        $user = auth()->user();

        $Student = Student::where('ssn', $barcode)->where('group_id', $groupId)->select('id')->first();
        $StudentsToInsert = array();

        $StudentsToInsert['subject_id'] = $subjectId;
        $StudentsToInsert['week_id'] = $weekId;
        $StudentsToInsert['student_id'] = $Student->id;
        $StudentsToInsert['group_id'] = $groupId;
        $StudentsToInsert['user_id'] = $user->id;
        $StudentsToInsert['created_at'] = Carbon::now();

        if (Attendance::where([
            'subject_id' => $subjectId,
            'week_id' => $weekId,
            'student_id' => $Student->id,
            'group_id' => $groupId,
            'user_id' => $user->id,
        ])->exists()) {
            return redirect()->back()->with('warning', 'Student Already Exist');
        }
        Attendance::insert($StudentsToInsert);

        return redirect()->back()->with('success', 'Data Saved Successfully');
    }

    public function printReport($subjectId)
    {
        $user = auth()->user();
        $subject = Subject::find($subjectId);
        $groups = Group::all(); // Retrieve all groups of students
        $weeks = Week::all();

        foreach ($groups as $group) {
            $group->load(['students' => function ($query) use ($subjectId) {
                $query->has('attendance')->whereHas('attendance', function ($query) use ($subjectId) {
                    $query->where('subject_id', $subjectId);
                });
            }]);
        }

        $groups = $groups->filter(function ($group) {
            return $group->students->isNotEmpty();
        });

        $pdf = Pdf::loadView('Instructor.front.printReport',['subject' => $subject,'user' => $user,'groups' => $groups,'weeks' => $weeks]);
        return $pdf->download($subject->nameEn.'.pdf');

     
    }
}

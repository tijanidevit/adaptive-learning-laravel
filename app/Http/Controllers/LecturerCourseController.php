<?php

namespace App\Http\Controllers;

use App\Models\LecturerCourse;
use Illuminate\Http\Request;

class LecturerCourseController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = [
            'lecturer_id' => $request->lecturer_id,
            'course_id' => $request->course_id,
        ];

        $check = LecturerCourse::all()->where('lecturer_id', $data['lecturer_id'])->where('course_id', $data['course_id'])->count();
        if ($check < 1) {
            LecturerCourse::create($data);
            return redirect()->back()->with('success','Lecturer successfully assigned to course');
        }

        return redirect()->back()->with('error','Lecturer already assigned to course');
        
    }

    public function update(Request $request, LecturerCourse $lecturerCourse)
    {
        //
    }

    public function destroy(LecturerCourse $lecturerCourse)
    {
        $lecturerCourse->delete();
        return redirect()->back()->with('success','Lecturer successfully unassigned to course');
    }  
}

<?php

namespace App\Http\Controllers;

use App\Models\CourseMaterial;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        //
    }

    public function studentIndex()
    {
        $student = auth()->user()->student;
        $exams = $student->exams()->orderBy('id', 'DESC')->get();
        $exams->load('exam');

        return view('student.courses.quiz.result', compact('exams'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Exam $exam)
    {
        //
    }

    public function edit(Exam $exam)
    {
        //
    }

    public function update(Request $request, CourseMaterial $courseMaterial, Exam $exam)
    {
        $material = $courseMaterial;
        $material_id = $material->id;
        $exam_material_id = $exam->course_material_id;

        if ($material_id != $exam_material_id) {
            return redirect()->back()->with('error', 'Exam not found');
        }

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $exam->update($data);
        return redirect()->back()->with('success', 'Exam updated successfully!');
    }

    public function destroy(Exam $exam)
    {
        //
    }
}

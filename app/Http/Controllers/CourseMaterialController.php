<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;

class CourseMaterialController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Course $course)
    {
        $lecturer = auth()->user()->lecturer;
        $lecturer_id = $lecturer['id'];

        $data = $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif,jfif',
            'video_link' => 'required',
            'duration' => 'required',
            'description' => 'required',
        ]);

        $data['image'] = $this->uploadImage($request, 'image', 'public/lecturer_materials/images/');
        $course_material = $course->materials()->create($data);

        $quiz_data = [
            'title' => $data['title'] . ' Quiz',
            'description' => 'Quiz Description'
        ];

        $course_material->exam()->create($quiz_data);

        return redirect()->back()->with('success', 'Material Added Successfully!');
    }

    public function show(CourseMaterial $courseMaterial)
    {
        //
    }

    public function lecturerShow(Course $course, CourseMaterial $courseMaterial)
    {
        $material = $course->materials()->where('id', $courseMaterial->id)->first();

        if (empty($material)) {
            return redirect()->route('lecturer.courses.view', $course->id)->with('error', 'Course Material not found');
        }

        $material->load('exam');

        return view('lecturer.courses.materials.view', compact('course', 'material'));
    }

    public function studentShow(Course $course, CourseMaterial $courseMaterial)
    {
        $material = $course->materials()->where('id', $courseMaterial->id)->first();

        if (empty($material)) {
            return redirect()->route('student.courses.view', $course->id)->with('error', 'Course Material not found');
        }

        $material->load('exam');

        return view('student.courses.materials.view', compact('course', 'material'));
    }

    public function edit(CourseMaterial $courseMaterial)
    {
        //
    }

    public function update(Request $request, CourseMaterial $courseMaterial)
    {
        //
    }

    public function destroy(CourseMaterial $courseMaterial)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Level;
use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\StudentExam;
use Illuminate\Http\Request;
use App\Models\LecturerCourse;

use function PHPUnit\Framework\isNull;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all()->sortBy('code');
        return view('admin.courses.index', compact('courses'));
    }

    public function lecturerIndex()
    {
        $lecturer = auth()->user()->lecturer;
        $lecturer_id = $lecturer['id'];
        $lecturer_courses = $lecturer->courses;
        $lecturer_courses->load('course');
        return view('lecturer.courses.index', compact('lecturer_courses'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('admin.courses.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
            'level_id' => 'required',
            'code' => 'required|unique:courses',
            'units' => 'required|integer',
            'description' => 'required| min:20',
        ]);

        $course = Course::create($data);

        $group_data = [
            'name' => $course->name . ' study group',
            'description' => 'This will help you learn ' . $course->name . ' better and easily at your pace'
        ];
        $course->group()->create($group_data);

        return redirect()->route('admin.courses.all')->with('success', $data['code'] . 'added successfully');
    }

    public function show(Course $course)
    {
        $course->load('lecturers.lecturer.user');
        $lecturers = User::all()->where('role', 1);
        $lecturers->load('lecturer');
        return view('admin.courses.view', compact('course', 'lecturers'));
    }

    public function lecturerShow(Course $course)
    {
        $course->load('level.students');
        $course->load('materials.exam');
        return view('lecturer.courses.view', compact('course'));
    }

    public function studentShow(Course $course)
    {
        $student = auth()->user()->student;
        $course->load('materials.exam');
        $course->load('lecturers.lecturer.user');
        $course->load('group');

        $last_passed_exam = $student->exams()->where('course_id', $course->id)->where('status', 1)->orderBy('exam_id', 'DESC')->orderBy('score', 'desc')->limit(1)->first();


        if ($last_passed_exam == null) {
            $next_material = $course->materials()->first();
            $previously_passed_materials = [];
            if (empty($next_material)) {
                return redirect()->back()->with('error', 'This course has no materials yet!');
            }
        } else {
            $material_id = $last_passed_exam->exam->course_material_id;

            $previously_passed_materials = $course->materials()->where('id', '<=', $material_id)->get();
            $next_material = $course->materials()->where('id', '>', $material_id)->first();
        }

        return view('student.courses.view', compact('course', 'previously_passed_materials', 'next_material'));
    }

    public function edit(Course $course)
    {
        //
    }

    public function update(Request $request, Course $course)
    {
        //
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.all')->with('success', 'Course deleted successfully');
    }

    public function students(Course $course)
    {
        $level = $course->level;
        $students = $level->students;
        $students->load('user');
        return view('lecturer.courses.students.index', compact('students', 'course'));
    }
}

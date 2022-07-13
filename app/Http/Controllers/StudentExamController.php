<?php

namespace App\Http\Controllers;

use App\Models\CourseMaterial;
use App\Models\Exam;
use App\Models\Notification;
use App\Models\StudentExam;
use Illuminate\Http\Request;

class StudentExamController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request, Exam $exam)
    {
        $student = auth()->user()->student;
        $questions = $exam->questions;
        $total_questions = count($questions);

        $material = CourseMaterial::all()->where('id', $exam->course_material_id)->first();

        $course = $material->course;
        $course_id = $course->id;

        $questions_total_points = $questions->sum('points');

        $student_earned_points = 0;

        for ($i = 1; $i <= $total_questions; $i++) {
            if ($request->input('question' . $i) == 1) {
                $student_earned_points += $questions[$i - 1]->points;
            }
        }
        $seventy_percent_of_total_points = ((40 / 100) * $questions_total_points);

        $student_exam_data = [
            'exam_id' => $exam->id,
            'course_id' => $course->id,
            'score' => $student_earned_points,
        ];

        if ($student_earned_points < $seventy_percent_of_total_points) {

            $student_exam_data['status'] = 0;
            $student->exams()->create($student_exam_data);

            $check_once_passed = $student->exams()->where('exam_id', $exam->id)->where('status', 1)->count();

            if ($check_once_passed < 1) {
                $total_trials = $student->exams()->where('exam_id', $exam->id)->where('status', 0)->count();

                if ($total_trials >= 3) {
                    $message = $student->user->fullname . ' is having difficulties to pass ' . $exam->title . ', please message him/her and help the student to pass the quiz. The student has tried ' . $total_trials . ' times';
                    $notification_data = [
                        'lecturer_id' => $course->lecturers[0]->lecturer->id,
                        'course_material_id' => $material->id,
                        'title' => 'A student struggling with ' . $course->title,
                        'message' => $message,
                        'student_id' => $student->id,
                        'status' => 0
                    ];

                    Notification::create($notification_data);
                }
            }

            return redirect()->back()->with('error', 'You did not pass this quiz. You score ' . $student_earned_points . ' you need to score at least ' . $seventy_percent_of_total_points . ' points');
        } else {
            $student_exam_data['status'] = 1;
            $student->exams()->create($student_exam_data);
        }

        return redirect()->route('student.courses.view', [$course_id])->with('success', 'You are flying high. Quiz passed successfully! Move to the next stage');
    }
    public function show(StudentExam $studentExam)
    {
        //
    }
    public function edit(StudentExam $studentExam)
    {
        //
    }
    public function update(Request $request, StudentExam $studentExam)
    {
        //
    }

    public function destroy(StudentExam $studentExam)
    {
        //
    }
}

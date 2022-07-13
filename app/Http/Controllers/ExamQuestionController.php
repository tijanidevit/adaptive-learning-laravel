<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    public function index(Exam $exam)
    {
        $material = CourseMaterial::all()->where('id', $exam->course_material_id)->first();
        $course = $material->course;

        $questions = ExamQuestion::all()->where('exam_id', $exam->id);

        $opt = ['A', 'B', 'C', 'D'];

        return view('student.courses.quiz.index', compact('course', 'material', 'questions', 'exam', 'opt'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Exam $exam)
    {
        // dd($exam);
        $data = $request->validate([
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'is_answer' => 'required',
            'points' => 'required',
        ]);

        $question_data = [
            'question' => $data['question'],
            'points' => $data['points'],
        ];

        $question = $exam->questions()->create($question_data);

        // dd($question);
        for ($i = 1; $i < 5; $i++) {
            $option_data = [
                'option' => $data['option' . $i],
                'is_answer' => 0
            ];

            if ($data['is_answer'] == $i) {
                $option_data['is_answer'] = 1;
            }

            $question->options()->create($option_data);
        }
        return redirect()->back()->with('success', 'Question set successfully');
    }

    public function show(ExamQuestion $examQuestion)
    {
    }

    public function edit(ExamQuestion $examQuestion)
    {
        //
    }

    public function update(Request $request, ExamQuestion $examQuestion)
    {
        //
    }

    public function destroy(ExamQuestion $examQuestion)
    {
        //
    }
}

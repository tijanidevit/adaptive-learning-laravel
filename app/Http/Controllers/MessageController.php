<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Message;
use App\Models\Student;
use Illuminate\Http\Request;

class MessageController extends Controller
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
        $data = $request->validate([
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required',
            'course_id' => 'required',
        ]);

        Message::create($data);
    }

    public function show(Message $message)
    {
        //
    }

    public function edit(Message $message)
    {
        //
    }

    public function update(Request $request, Message $message)
    {
        //
    }

    public function destroy(Message $message)
    {
        //
    }

    public function lecturerMessages(Course $course, Student $student)
    {
        $user = auth()->user();
        $messages = Message::where('course_id', $course->id)->where('sender_id', $student->user->id)->orWhere('receiver_id', $student->user->id)->get();

        return view('lecturer.messages.view', compact('messages', 'student', 'course'));
    }


    public function studentMessages(Course $course)
    {
        $user = auth()->user();
        $messages = Message::where('course_id', $course->id)->where('sender_id', $user->id)->orWhere('receiver_id', $user->id)->get();
        $student = $user->student;
        return view('student.courses.messages', compact('messages', 'course'));
    }

    public function studentAjaxMessages(Course $course)
    {
        $user = auth()->user();
        $messages = Message::where('course_id', $course->id)->where('sender_id', $user->id)->orWhere('receiver_id', $user->id)->get();
        $student = $user->student;

        $result = '';

        foreach ($messages as $message) {
            if ($message->sender_id == $user->id) {
                $sender = ' You ';
                $cc = 'justify-content-end';
            } else {
                $sender = 'Lecturer';
                $cc = 'justify-content-start';
            }
            $result .= '
            <div class="d-flex ' . $cc . '">
                <div>
                    <div class="heading">' . $sender . ' 
                        : ' . $message->created_at . '
                    </div>
                    <div class="mb-4 bg-light p-2" style=" border-radius: 15px;">
                        
                        <p>
                            ' . $message->message . '
                        </p>
                    </div>
                </div>
            </div>';
        }

        return $result;
    }


    public function lecturerAjaxMessages(Course $course, Student $student)
    {
        $user = auth()->user();
        $messages = Message::where('course_id', $course->id)->where('sender_id', $student->user->id)->orWhere('receiver_id', $student->user->id)->get();

        $result = '';

        foreach ($messages as $message) {
            // dd(auth()->user()->id);
            if ($message->sender_id == auth()->user()->id) {
                $cc = 'justify-content-end';
                $sender = 'You';
            } else {
                $cc = 'justify-content-start';
                $sender = $student->user()->fullname;
            }

            return (json_encode($messages));
        }
    }
}

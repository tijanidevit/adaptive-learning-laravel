<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createAdmin()
    {
        $data = [
            'fullname' => 'Administrator',
            'email' => 'admin@fpi.com',
            'image' => 'default.png',
            'role' => 0,
        ];

        $data['password'] = Hash::make('admin');
        User::create($data);
    }

    public function login(Request $request)
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $role = auth()->user()->role;

            if ($role == 0) {
                return redirect()->route('admin.dashboard');
            } elseif ($role == 1) {
                return redirect()->route('lecturer.dashboard');
            } else {
                return redirect()->route('student.dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function adminDashboard()
    {
        $user = auth()->user();

        $total_courses = Course::all()->count();
        $total_lecturers = Lecturer::all()->count();
        $total_students = Student::all()->count();


        $lecturers = User::all()->where('role', 1);
        $lecturers->load('lecturer');

        if ($user->role == 0) {
            return view('admin.dashboard', compact(['total_courses', 'total_lecturers', 'total_students', 'lecturers']));
        }
    }

    public function lecturerDashboard()
    {
        $user = auth()->user();
        $lecturer = $user->lecturer;

        $total_courses = $lecturer->courses()->count();
        $total_students = Student::all()->count();

        $courses = $lecturer->courses;
        $courses->load('course');

        if ($user->role == 1) {
            return view('lecturer.dashboard', compact(['total_courses', 'total_students', 'courses']));
        }
    }


    public function studentDashboard()
    {
        $user = auth()->user();
        $student = $user->student;

        $total_courses = $student->level->courses()->count();
        $courses = $student->level->courses;
        $courses->load('lecturers.lecturer.user');


        if ($user->role == 2) {
            return view('student.dashboard', compact(['total_courses', 'courses', 'student']));
        }
    }
}

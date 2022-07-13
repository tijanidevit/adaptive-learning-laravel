<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::all()->where('role', 2);
        $students->load('student');

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('admin.students.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $dt = $request->validate([
            'csv' => 'required',
            'level_id' => 'required',
        ]);

        $file = $request->file('csv');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $tempPath = $file->getRealPath();
            $location = 'uploads';
            $file->move($location, $filename);
            $filepath = public_path($location . "/" . $filename);
            $file = fopen($filepath, "r");
            $importData_arr = array(); // Read through the file and store the contents as an array
            $i = 0;
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata);
                if ($i == 0) {
                    $i++;
                    continue;
                }
                for ($c = 0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;
            }
            fclose($file); //Close after reading
            $j = 0;

            foreach ($importData_arr as $importData) {
                $fullname = $importData[0];
                $email = $importData[1];
                $matric_no = $importData[2];
                $j++;
                try {
                    $check = User::all()->where('email', $email)->count();
                    if (!$check) {
                        $user = User::create([
                            'fullname' => $fullname,
                            'email' => $email,
                            'role' => 2,
                            'password' => Hash::make('1234567')
                        ]);

                        $student_data = [
                            'matric_no' => $matric_no,
                            'level_id' => $request->level_id
                        ];
                        $user->student()->create($student_data);
                    }
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }

            return redirect()->back()->with('success', 'Students added succeesfully');
        }
    }
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    public function update(Request $request, Student $student)
    {
        //
    }

    public function destroy(Student $student)
    {
    }

    public function lecturerPerformance(Course $course, Student $student)
    {
        $course_id = $course->id;
        $performances = $student->exams()->where('course_id', $course_id)->get();
        $performances;
        $student->load('user');

        return view('lecturer.courses.students.view', compact('course', 'student', 'performances'));
    }

    public function performance(Student $student)
    {
    }
}

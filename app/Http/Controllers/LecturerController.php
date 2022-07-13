<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = User::all()->where('role', 1);
        $lecturers->load('lecturer');

        return view('admin.lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        return view('admin.lecturers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|min:5',
            'staff_id' => 'required|unique:lecturers',
            'email' => 'required|unique:users',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'about' => 'required| min:20',
        ]);

        $lecturer_data = [
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'role' => 1,
            'password' => Hash::make('1234567'),
        ];

        $lecturer_data['image'] = $this->uploadImage($request, 'image', 'public/lecturers/images/');

        $lecturer = User::create($lecturer_data);

        $lec_data = [
            'staff_id' => $data['staff_id'],
            'about' => $data['about']
        ];
        $lecturer->lecturer()->create($lec_data);

        return redirect()->route('admin.lecturers.all')->with('success',$data['fullname']. ' added successfully');
    }

    public function show(Lecturer $lecturer)
    {
        //
    }

    public function edit(Lecturer $lecturer)
    {
        //
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    public function destroy(Lecturer $lecturer)
    {
        $lecturer->user()->delete();
        $lecturer->delete();
        return redirect()->route('admin.lecturers.all')->with('success','Lecturer deleted successfully');
    }
}

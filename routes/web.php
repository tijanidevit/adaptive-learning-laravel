<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::post('/auth/login', [App\Http\Controllers\AuthController::class, 'login'])->name('auth_login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/create', [App\Http\Controllers\AuthController::class, 'createAdmin'])->name('create.admin');
    Route::get('/dashboard', [App\Http\Controllers\AuthController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index'])->name('admin.courses.all');
    Route::get('courses/new', [App\Http\Controllers\CourseController::class, 'create'])->name('admin.courses.create');
    Route::get('/courses/{course}', [App\Http\Controllers\CourseController::class, 'show'])->name('admin.courses.view');
    Route::post('/courses', [App\Http\Controllers\CourseController::class, 'store'])->name('admin_courses_store');
    Route::delete('/courses/{course}', [App\Http\Controllers\CourseController::class, 'destroy'])->name('admin_courses_delete');

    Route::get('/lecturers', [App\Http\Controllers\LecturerController::class, 'index'])->name('admin.lecturers.all');
    Route::get('/lecturers/new', [App\Http\Controllers\LecturerController::class, 'create'])->name('admin.lecturers.create');
    Route::get('/lecturers/{lecturer}', [App\Http\Controllers\LecturerController::class, 'view'])->name('admin.lecturers.view');
    Route::post('/lecturers', [App\Http\Controllers\LecturerController::class, 'store'])->name('admin_lecturers_store');

    Route::delete('/lecturers/{lecturer}', [App\Http\Controllers\LecturerController::class, 'destroy'])->name('admin_lecturers_delete');

    Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('admin.students.all');
    Route::get('/students/new', [App\Http\Controllers\StudentController::class, 'create'])->name('admin.students.create');
    Route::post('/students/store', [App\Http\Controllers\StudentController::class, 'store'])->name('admin_students_store');
    Route::delete('/students/{student}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('admin_students_delete');

    Route::post('/courses/assign/lecturers/', [App\Http\Controllers\LecturerCourseController::class, 'store'])->name('admin_lecturer_course');
    Route::delete('/courses/assign/lecturers/{lecturerCourse}', [App\Http\Controllers\LecturerCourseController::class, 'destroy'])->name('admin_lecturer_courses_delete');
});

Route::middleware(['auth'])->prefix('lecturers')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AuthController::class, 'lecturerDashboard'])->name('lecturer.dashboard');

    Route::get('/courses', [App\Http\Controllers\CourseController::class, 'lecturerIndex'])->name('lecturer.courses.all');
    Route::get('/courses/{course}', [App\Http\Controllers\CourseController::class, 'lecturerShow'])->name('lecturer.courses.view');
    Route::post('/courses', [App\Http\Controllers\CourseController::class, 'store'])->name('lecturer_courses_store');
    Route::delete('/courses/{course}', [App\Http\Controllers\CourseController::class, 'destroy'])->name('lecturer_courses_delete');

    Route::get('/courses/{course}/materials/{courseMaterial}', [App\Http\Controllers\CourseMaterialController::class, 'lecturerShow'])->name('lecturer.courses.materials.view');
    Route::post('/courses/{course}/materials', [App\Http\Controllers\CourseMaterialController::class, 'store'])->name('lecturer_courses_materials_store');

    Route::patch('/materials/{courseMaterial}/exams/{exam}', [App\Http\Controllers\ExamController::class, 'update'])->name('lecturer_materials_exams_update');

    Route::post('/exams/{exam}/questions', [App\Http\Controllers\ExamQuestionController::class, 'store'])->name('lecturer_exams_question_store');

    Route::get('/courses/{course}/students/', [App\Http\Controllers\CourseController::class, 'students'])->name('lecturer.courses.students.all');

    Route::get('/courses/{course}/students/performances', [App\Http\Controllers\CourseMaterialController::class, 'lecturerShow'])->name('lecturer.courses.students.performances');

    Route::get('/courses/{course}/students/{student}/performances', [App\Http\Controllers\StudentController::class, 'lecturerPerformance'])->name('lecturer.courses.students.individual.performances');

    Route::get('ajax/courses/{course}/students/{student}/messages', [App\Http\Controllers\MessageController::class, 'lecturerAjaxMessages']);

    Route::post('ajax/courses/students/messages', [App\Http\Controllers\MessageController::class, 'store']);

    Route::get('/courses/{course}/students/{student}/messages', [App\Http\Controllers\MessageController::class, 'lecturerMessages'])->name('lecturer.courses.students.messages');

    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'lecturerIndex'])->name('lecturer.notifications.all');

    Route::get('/notifications/{notification}', [App\Http\Controllers\NotificationController::class, 'show'])->name('lecturer.notifications.view');

    Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('lecturer.students.all');
});



Route::middleware(['auth'])->prefix('students')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AuthController::class, 'studentDashboard'])->name('student.dashboard');

    Route::get('/courses', [App\Http\Controllers\CourseController::class, 'studentIndex'])->name('student.courses.all');
    Route::get('/courses/{course}', [App\Http\Controllers\CourseController::class, 'studentShow'])->name('student.courses.view');

    Route::get('/courses/{course}/group', [App\Http\Controllers\GroupController::class, 'show'])->name('student.courses.group.view');

    Route::post('ajax/courses/group/messages', [App\Http\Controllers\GroupChatController::class, 'store']);
    Route::get('ajax/courses/group/{group}/messages', [App\Http\Controllers\GroupChatController::class, 'ajaxShow']);

    Route::get('ajax/courses/{course}/students/messages', [App\Http\Controllers\MessageController::class, 'studentAjaxMessages']);

    Route::post('ajax/courses/students/messages', [App\Http\Controllers\MessageController::class, 'store']);

    Route::get('/courses/{course}/students/messages', [App\Http\Controllers\MessageController::class, 'studentMessages'])->name('student.courses.messages');

    Route::get('/courses/{course}/materials/{courseMaterial}', [App\Http\Controllers\CourseMaterialController::class, 'studentShow'])->name('student.courses.materials.view');

    Route::get('/materials/{courseMaterial}/exams/{exam}', [App\Http\Controllers\ExamController::class, 'show'])->name('student_materials_exams_view');

    Route::get('/exams/{exam}/questions', [App\Http\Controllers\ExamQuestionController::class, 'index'])->name('student.exams.question.view');

    Route::post('/exams/{exam}/questions', [App\Http\Controllers\StudentExamController::class, 'store'])->name('student_exam_grade_and_store');

    Route::get('/courses/{course}/students/', [App\Http\Controllers\CourseController::class, 'students'])->name('student.courses.students.all');

    Route::get('/courses/{course}/students/performances', [App\Http\Controllers\CourseMaterialController::class, 'studentShow'])->name('student.courses.students.performances');
    Route::get('/courses/{course}/students/{student}/performances', [App\Http\Controllers\StudentController::class, 'studentPerformance'])->name('student.courses.students.individual.performances');

    Route::get('/exams', [App\Http\Controllers\ExamController::class, 'studentIndex'])->name('student.exams.all');

    Route::get('/messages', [App\Http\Controllers\MessageController::class, 'studentIndex'])->name('student.messages.all');
});

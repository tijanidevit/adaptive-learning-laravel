<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
    }
    public function lecturerIndex()
    {
        $lecturer = auth()->user()->lecturer;
        // dd($lecturer->notifications);
        $notifications = $lecturer->notifications;
        $notifications->load('course_material.course');
        $notifications->load('student');
        $lecturer->load('courses');

        $unread_notifications = $lecturer->unread_notifications;
        foreach ($unread_notifications as $ntf) {
            $ntf->update(['status' => 1]);
        }
        return view('lecturer.notifications.index', compact('notifications', 'lecturer'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Notification $notification)
    {
        //
    }

    public function edit(Notification $notification)
    {
        //
    }

    public function update(Request $request, Notification $notification)
    {
        //
    }

    public function destroy(Notification $notification)
    {
        //
    }
}

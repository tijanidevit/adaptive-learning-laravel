<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class GroupChatController extends Controller
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
        $student = auth()->user()->student;
        $student_id = $student->id;
        $data = $request->validate([
            'group_id' => 'required',
            'message' => 'required'
        ]);

        $data['student_id'] = $student_id;

        GroupChat::create($data);
    }

    public function ajaxShow(Group $group)
    {
        $student = auth()->user()->student;
        $student_id = $student->id;
        $result = '';
        $chats = $group->chats;
        foreach ($chats as $chat) {
            if ($chat->student_id == $student_id) {
                $sender = ' You ';
                $cc = 'justify-content-end';
            } else {
                $std = Student::all()->where('id', $chat->student_id)->first();
                $sender = $std->user->fullname;
                $cc = 'justify-content-start';
            }
            $result .= '
            <div class="d-flex ' . $cc . '">
                <div>
                    <div class="heading">' . $sender . ' 
                        : ' . $chat->created_at . '
                    </div>
                    <div class="mb-4 bg-light p-2" style=" border-radius: 15px;">
                        
                        <p>
                            ' . $chat->message . '
                        </p>
                    </div>
                </div>
            </div>';
        }

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupChat  $groupChat
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupChat $groupChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupChat  $groupChat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupChat $groupChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupChat  $groupChat
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupChat $groupChat)
    {
        //
    }
}

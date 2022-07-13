@extends('lecturer.layout.main')
@section('content')

<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
    <div class="card" id="kt_chat_messenger">
        <div class="card-header" id="kt_chat_messenger_header">
            <div class="card-title">
                <div class="d-flex justify-content-center flex-column me-3">
                    <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{$student->user->fullname}}</a>
                    <div class="mb-0 lh-1">
                        <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                        <span class="fs-7 fw-bold text-muted">Active</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body" id="kt_chat_messenger_body">
            <!--begin::Messages-->
            <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto messageArea" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px">
                
                @forelse ($messages as $message)
                <div class="d-flex  justify-content-@if(auth()->user()->id == $message->sender_id)end @else start @endif mb-10">
                    <div class="d-flex flex-column align-items-start">
                        <div class="d-flex align-items-center mb-2">
                            <div class="ms-3">
                                <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">
                                    @if ($message->sender_id == auth()->user()->id)
                                        You
                                    @else
                                        {{$student->user->fullname}}
                                    @endif
                                </a>
                                <span class="text-muted fs-7 mb-1">{{$message->created_at}}</span>
                            </div>
                        </div>
                        <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">{{$message->message}}</div>
                    </div>
                </div>
                @empty
                    <p class="text-center"> Send a message now and start the conversation </p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                @endforelse
                

            </div>

            
        </div>
        <div class="card-footer pt-4" id="kt_chat_messenger_footer">
            <form id="messageForm" method="POST">
                @csrf;
                <textarea id="messageBox" required name="message" class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>

                <input type="hidden" id="" name="receiver_id" value="{{$student->user->id}}">
                <input type="hidden" id="studentId" name="student_id" value="{{$student->id}}">
                <input type="hidden" id="senderId" name="sender_id" value="{{auth()->user()->id}}">
                <input type="hidden" id="courseId" name="course_id" value="{{$course->id}}">
                <div class="d-flex flex-stack">
                    <div class="d-flex align-items-center me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-paperclip fs-3"></i>
                        </button>
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-upload fs-3"></i>
                        </button>
                    </div>
                    <button class="btn btn-primary" type="submit" >Send</button>
                </div>
            </form>
        </div>
    </div>

@endsection
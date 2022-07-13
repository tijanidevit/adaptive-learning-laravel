@extends('student.layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="page-title-container">
                <div class="row">
                    <div class="col-12 col-md-10">
                        <h1 class="mb-0 pb-0 display-4" id="title">
                            {{$group->name}}
                        </h1>
                        <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                            <ul class="breadcrumb pt-0">
                                <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Dashboard</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <div class="col-12 col-xl-4 col-xxl-3">
                    <h2 class="small-title">Details</h2>
                    <div class="card mb-2">
                        <div class="card-body mb-3">
                            <div class="d-flex align-items-center flex-column mb-5">
                                <div class="mb-4 d-flex align-items-center flex-column">
                                    <div class="sw-13 position-relative mb-3">
                                        <img src="{{asset('storage/courses/images/'.$course->thumbnail)}}" class="img-fluid rounded-xl" alt="thumb">
                                    </div>
                                    <div class="h5 mb-0">{{$group->name}}</div>
                                    <div class="text-muted mb-2">{{$course->title}}</div>
                                    <div class="text-muted text-center">
                                        {{$group->description}}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <p class="text-small text-muted mb-2">ABOUT COURSE</p>
                                <p>
                                    {{$course->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8 col-xxl-9" >
                    <h2 class="small-title">Chats</h2>
                    <div class="card mb-1" style="overflow-y: scroll; max-height: 37.7em" >
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="heading">GROUP DISCUSSION</div>
                            </div>
                            <hr>

                            <div class="" id="messageArea">


                                @forelse ($chats as $chat)
                                    <div class="d-flex @if ($chat->student_id == $student->id)  justify-content-end @else  justify-content-start @endif">
                                        <div>
                                            <div class="heading">
                                                @if ($chat->student_id == $student->id)
                                                    You
                                                @else
                                                    {{$chat->student->user->fullname}}
                                                @endif
                                                : {{$chat->created_at}}
                                            </div>
                                            <div class="mb-4 bg-light p-2" style=" border-radius: 15px;">
                                                
                                                <p>
                                                    {{$chat->message}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center">No messages sent yet!</div>
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
                                    <br>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST" id="groupMessageForm">
                                @csrf
                                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Type a message here"></textarea>
                                <input type="hidden" name="group_id" id="group_id" value="{{$group->id}}">
                                <div class="text-right"><button class="btn btn-dark mt-1 pull-right">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
<script>

    var groupId = $('#group_id').val();
    
	function getStudentMessage() {
		$.ajax({
			url:'http://127.0.0.1:8000/students/ajax/courses/'+courseId+'/students/'+studentId+'/messages',
            type: 'GET',
			dataType: 'json',
            cache: false,
            success: function(data){
				$('#messageArea').html('');
				data.forEach(message => {
					const el = `<div class="d-flex ${message.sender_id != userId ? 'justify-content-start' : 'justify-content-end'} mb-10">
                    <div class="d-flex flex-column align-items-end">
                        <div class="d-flex align-items-center mb-2">
                            <div class="me-3">
                                
                            </div>
                        </div>
                        <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                            ${message.message}
                        </div>
                    </div>
                </div>`;
				$('#messageArea').append(el)
				
			});
                
            }
		})
		// $('#messageArea').animate({
		// 	scrollTop = $(document).height()
		// }, 'fast')
	}
	// getStudentMessage();
	
	setInterval(() => {getGroupMessages()}, 1200);
	
    getGroupMessages();
	$('#groupMessageForm').submit(function (e){
		e.preventDefault();
		$.ajax({
			url:'http://127.0.0.1:8000/students/ajax/courses/group/messages',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            success: function(data){
				$('#messageArea').scrollTop = $('#messageArea').height;
				$('#message').val('');
            }
		})
	})
    function getGroupMessages() {
		$.ajax({
			url:'http://127.0.0.1:8000/students/ajax/courses/group/'+groupId+'/messages',
            type: 'GET',
            cache: false,
            success: function(data){
                console.log('d',data);
                console.log('dddddd');
				$('#messageArea').html(data);
			}
        });

	}
</script>
@endsection
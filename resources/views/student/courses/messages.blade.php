@extends('student.layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="page-title-container">
                <div class="row">
                    <div class="col-12 col-md-10">
                        <h1 class="mb-0 pb-0 display-4" id="title">
                            {{$course->title}}
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
                                    {{-- <div class="h5 mb-0">{{$group->name}}</div> --}}
                                    <div class="text-muted mb-2">{{$course->title}}</div>
                                    <div class="text-muted text-center">
                                        {{-- {{$group->description}} --}}
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


                                @forelse ($messages as $message)
                                    <div class="d-flex @if ($message->sender_id == auth()->user()->id)  justify-content-end @else  justify-content-start @endif">
                                        <div>
                                            <div class="heading">
                                                @if ($message->sender_id == auth()->user()->id)
                                                    You
                                                @else
                                                    Lecturer
                                                @endif
                                                : {{$message->created_at}}
                                            </div>
                                            <div class="mb-4 bg-light p-2" style=" border-radius: 15px;">
                                                
                                                <p>
                                                    {{$message->message}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center">No message sent yet!</div>
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
                            <form action="" method="POST" id="courseMessageForm">
                                @csrf
                                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Type a message here"></textarea>
                                <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                <input type="hidden" name="sender_id" id="sender_id" value="{{auth()->user()->id}}">
                                <input type="hidden" name="receiver_id" id="receiver_id" value="{{$course->lecturers[0]->lecturer->user->id}}">
                                <div class="text-right"><button class="btn btn-dark mt-1 pull-right">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
<script>

    var courseId = $('#course_id').val();
    
	
	setInterval(() => {getCourseMessages()}, 1200);
	
    getCourseMessages();

	$('#courseMessageForm').submit(function (e){
		e.preventDefault();
		$.ajax({
			url:'http://127.0.0.1:8000/students/ajax/courses/students/messages',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            success: function(data){
				$('#messageArea').scrollTop = $('#messageArea').height;
				$('#message').val('');
            }
		})
	})
    function getCourseMessages() {
		$.ajax({
			url:'http://127.0.0.1:8000/students/ajax/courses/'+courseId+'/students/messages',
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
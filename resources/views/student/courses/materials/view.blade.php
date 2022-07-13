@extends('student.layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="page-title-container">
                <div class="row">
                    <div class="col-12 col-md-10">
                        <h1 class="mb-0 pb-0 display-4" id="title">
                            <a href="{{route('student.courses.view',$course->id)}}">{{$course->title}}</a> / {{$material->title}}
                        </h1>
                        <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                            <ul class="breadcrumb pt-0">
                                <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Dashboard</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 col-sm-2 d-flex align-items-start justify-content-end">
                        <a href="{{route('student.exams.question.view', optional($material->exam)->id)}}" class="btn btn-primary btn-icon btn-icon-start w-100 w-sm-auto">
                            <i data-cs-icon="chevron-right"></i>
                            <span>Take Quiz</span>
                        </a>
                    </div>

                </div>
            </div>

            
				<div class="row">
                    @if (session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    
                    @if (session('error'))
                        <div class="alert alert-warning">{{session('error')}}</div>
                    @endif

					<div class="col-8 col-xxl-8 mb-5">
						<div class="card mb-5 p-3">

                            <iframe src="{{$material->video_link}}" style="height: 30em" frameborder="0"></iframe>
                            
                            <div class="card-body">
                                <h6>{{$material->title}}</h6>
                                <p class="mb-4">
                                    {!! $material->description !!}
                                </p>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            @if (!empty($course->lecturers) && $course->lecturers !=null && isset($course->lecturers[0]))
                                                <div class="sw-5 d-inline-block position-relative me-3">
                                                    <img src="{{asset('storage/lecturers/images/'.optional($course->lecturers[0]->lecturer->user)->image)}}" class="img-fluid rounded-xl" alt="thumb">
                                                </div>
                                                <div class="d-inline-block">
                                                    <a href="#">
                                                        {{optional($course->lecturers[0]->lecturer->user)->fullname}}
                                                    </a>
                                                    <div class="text-muted text-small">Lecturer</div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6 text-muted">
                                        <div class="row g-0 justify-content-end">
                                            <div class="col-auto" title="materials">
                                                <i data-cs-icon="book" class="text-primary me-1" data-cs-size="15"></i>
                                                <span class="align-middle">{{count($course->materials)}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
                    </div>


                        <div class="col-4 col-xxl-4 mb-n5">
                            @if (!empty($course->group))
                                <h2 class="small-title">Study Group</h2>
                                <div class="scroll-out">
                                    <div class="scroll-by-count" data-count="3">
                                        <div class="row g-2">
                                            <div class="col-12 col-xl-12 sh-19">
                                                <div class="card h-70 mb-3 hover-scale-up">
                                                    <a class="card-body text-center" href="{{route('student.courses.group.view',$course->id)}}">
                                                        <i data-cs-icon="cupcake" class="text-primary"></i>
                                                        <p class="heading mt-3 text-body">{{optional($course->group)->name}}</p>
                                                        <div class="text-extra-small fw-medium text-muted">{{count($course->level->students)}} students</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            @endif

                            <h2 class="small-title mt-4">Short Quiz</h2>
                            <div class="card mb-5">
                                <div class="card-body">
                                    <h4>{{optional($material->exam)->title}}</h4>
                                    <div class="row g-0">
                                        
                                        <div class="col mb-4">
                                            <div class="h-100">
                                                <div class="d-flex flex-column justify-content-start">
                                                    <div class="d-flex flex-column">
                                                        <p class="heading">
                                                            {{optional($material->exam)->description}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{route('student.exams.question.view', optional($material->exam)->id)}}" class="btn btn-primary btn-icon btn-icon-start w-100 w-sm-auto">
                                                <i data-cs-icon="chevron-right"></i>
                                                <span>Take Quiz</span>
                                            </a>
                                        </div>
                                    </div>
                                    

                                </div>
                            </div>
                            
                        </div>
                    </div>
					
				</div>
            
        </div>
    </main>
@endsection
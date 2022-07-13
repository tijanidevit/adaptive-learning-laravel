@extends('student.layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="page-title-container">
                <div class="row">
                    <div class="col-12 col-md-10">
                        <h1 class="mb-0 pb-0 display-4" id="title">
                            <a href="{{route('student.courses.materials.view',[$course->id,$material->id])}}">{{$material->title}}</a> / Quiz
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
                @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                
                @if (session('error'))
                    <div class="alert alert-warning">{{session('error')}}</div>
                @endif

                <div class="col-lg-4 col-xxl-3">
                    <h2 class="small-title">Quiz Info</h2>
                    <div class="card mb-5">
                        <img src="{{asset('storage/lecturer_materials/images/'.$material->image)}}" class="card-img-top sh-25" alt="card image">
                        <div class="card-body">
                            <h4>{{$exam->title}}</h4>
                            <div class="mb-3 text-muted">
                                {{$exam->description}}
                            </div>
                            <div class="row g-0 align-items-center mb-1">
                                <div class="col-auto">
                                    <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                        <i data-cs-icon="form-check" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Questions</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-4 d-flex align-items-center text-alternate">{{count($questions)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center mb-1">
                                <div class="col-auto">
                                    <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                        <i data-cs-icon="clock" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Time</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-4 d-flex align-items-center text-alternate">Take your time</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center">
                                <div class="col-auto">
                                    <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                        <i data-cs-icon="graduation" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Level</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-4 d-flex align-items-center text-alternate">Beginner</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="small-title">Time</h2>
                    <div class="card">
                        <div class="card-body">
                            <div id="timer"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-xxl-9">
                    <form method="POST" action="{{route('student_exam_grade_and_store',$exam->id)}}">
                        @csrf
                        <h2 class="small-title">Questions</h2>

                        @forelse ($questions as $i => $question)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex flex-row align-content-center align-items-center mb-5">
                                        <div class="sw-5 me-4">
                                            <div class="border border-1 border-primary rounded-xl sw-5 sh-5 text-primary d-flex justify-content-center align-items-center">{{$i += 1}}</div>
                                        </div>
                                        <div class="heading mb-0">
                                            {{$question->question}}
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="d-flex flex-row align-content-center align-items-center position-relative mb-3">
                                        <div class="sw-5 me-4 d-flex justify-content-center flex-grow-0 flex-shrink-0">
                                            <div class="d-flex justify-content-center align-items-center">
                                            </div>
                                        </div>
                                        <div class="mb-0 text-alternate">
                                            <select class="form-control" name="question{{$i}}" id="">
                                                @forelse ($question->options as $i => $option)
                                                    <option value="{{$option->is_answer}}">{{$option->option}}</option>
                                                    @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">No questions added yet!</div>
                        @endforelse

                        <div class="row mt-7">
                            <div class="col-12 text-center">
                                <button class="btn btn-outline-primary btn-icon btn-icon-end sw-25">
                                    <span>Done</span>
                                    <i data-cs-icon="check"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
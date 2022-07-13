@extends('student.layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="page-title-container">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <h1 class="mb-0 pb-0 display-4" id="title">{{auth()->user()->fullname}}</h1>
                        <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                            <ul class="breadcrumb pt-0">
                                <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Dashboard</a></li>
                            </ul>
                        </nav>
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
                <div class="col-xl-8 mb-5">
                    <h2 class="small-title">Continue Learning</h2>
                    <div class="scroll-out">
                        <div class="scroll-by-count" data-count="3">
                            <div class="row">
                                @forelse ($courses as $course)
                                    <div class="col-md-6">
                                        <div class="card mb-2" style="min-height: 140px; max-height: 140px;">
                                            <div class="row g-0 sh-14">
                                                <div class="col-auto">
                                                    <a href="{{route('student.courses.view', $course->id)}}" class="d-block position-relative ">
                                                        <img src="{{asset('storage/courses/images/'.$course->thumbnail)}}" alt="alternate text" class="card-img card-img-horizontal sw-14 sw-lg-17 ml-2">
                                                        <button class="btn btn-icon-only btn-icon-start btn-foreground btn-sm px-3 position-absolute absolute-center opacity-75" type="button">
                                                            <i data-cs-icon="play" data-cs-size="16" data-cs-fill="var(--primary)"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <div class="card-body pt-0 pb-0 h-100 d-flex align-items-center">
                                                        <div class="w-100">
                                                            <div class="d-flex flex-row justify-content-between mb-2">
                                                                <a href="{{route('student.courses.view', $course->id)}}">{{$course->title}}</a>
                                                                <div class="text-muted">67%</div>
                                                            </div>
                                                            <div class="progress mb-2">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 mb-5">
                    <h2 class="small-title">Study Groups ({{count($courses)}})</h2>
                    <div class="scroll-out">
                        <div class="scroll-by-count" data-count="3">
                            <div class="row g-2">
                                @forelse ($courses as $course)
                                <div class="col-6 col-xl-6 sh-19">
                                    <div class="card h-70 mb-3 hover-scale-up">
                                        <a class="card-body text-center" href="{{route('student.courses.group.view',$course->id)}}">
                                            <i data-cs-icon="cupcake" class="text-primary"></i>
                                            <p class="heading mt-3 text-body">
                                                
                                                {{optional($course->group)->name}}
                                            </p>
                                            <div class="text-extra-small fw-medium text-muted">{{count(optional($student->level)->students)}} students</div>
                                        </a>
                                    </div>
                                </div>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
@endsection
@extends('student.layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="page-title-container">
                <div class="row">
                    <div class="col-12 col-md-10">
                        <h1 class="mb-0 pb-0 display-4" id="title">
                            Quizzes
                        </h1>
                        <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                            <ul class="breadcrumb pt-0">
                                <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Dashboard</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row d-none d-lg-flex mb-3 g-0">
                
                <div class="col">
                    <div class="row gx-2 px-5">
                        <div class="col-5">
                            <div class="text-muted text-small">QUIZ</div>
                        </div>
                        <div class="col-3">
                            <div class="text-muted text-small">SCORE</div>
                        </div>
                        <div class="col-3">
                            <div class="text-muted text-small">STATUS</div>
                        </div>
                        <div class="col-1">
                            <div class="text-muted text-small">TIME</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-3 mb-5">

                @forelse ($exams as $exam)
                    <div class="col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="row g-0 h-auto sh-lg-12">
                                <div class="col-12 col-lg p-0 h-100">
                                    <div class="card-body h-100">
                                        <div class="row gx-2 d-flex h-100 align-items-lg-center">
                                            <div class="col-lg-5 mb-2 mb-lg-1">
                                                <a href="#" class="stretched-link body-link">
                                                    <div class="lh-1-5 mb-0">{{$exam->exam->title}}</div>
                                                </a>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="row gx-2 align-items-center">
                                                    <div class="col-auto d-lg-none">
                                                        <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                                            <i data-cs-icon="clock" class="text-primary"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col col-lg-12">
                                                        <div class="row g-0">
                                                            <div class="col d-lg-none">
                                                                <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Score</div>
                                                            </div>
                                                            <div class="col-auto col-lg-12">
                                                                <div class="sh-4 d-flex align-items-center text-alternate">{{$exam->score}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="row gx-2 align-items-center">
                                                    <div class="col-auto d-lg-none">
                                                        <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                                            <i data-cs-icon="form-check" class="text-primary"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col col-lg-12">
                                                        <div class="row g-0">
                                                            <div class="col d-lg-none">
                                                                <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Status</div>
                                                            </div>
                                                            <div class="col-auto col-lg-12">
                                                                <div class="sh-4 d-flex align-items-center text-alternate">
                                                                    @if ($exam->status == 1)
                                                                        <span class="text-success">
                                                                            Passed
                                                                        </span>
                                                                    @else
                                                                        <span class="text-warning">
                                                                            Not Passed
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="row gx-2 align-items-center">
                                                    <div class="col-auto d-lg-none">
                                                        <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                                            <i data-cs-icon="badge" class="text-primary"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col col-lg-12">
                                                        <div class="row g-0">
                                                            <div class="col d-lg-none">
                                                                <div class="text-alternate sh-4 d-flex align-items-center lh-1-25"></div>
                                                            </div>
                                                            <div class="col-auto col-lg-12">
                                                                <div class="sh-4 d-flex align-items-center text-alternate justify-content-lg-end">
                                                                    {{$exam->created_at}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    </main>
@endsection
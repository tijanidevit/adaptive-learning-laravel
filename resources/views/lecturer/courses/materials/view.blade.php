@extends('lecturer.layout.main')
@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="container-xxl" id="kt_content_container">

		<div class="card mb-5 mb-xxl-8">
			<div class="card-body pt-9 pb-0">
				<!--begin::Details-->
				<div class="d-flex flex-wrap flex-sm-nowrap">
					<div class="flex-grow-1">
						<!--begin::Title-->
						<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
							<!--begin::User-->
							<div class="d-flex flex-column">
								<!--begin::Name-->
								<div class="d-flex align-items-center mb-2">
									<a href="{{route('lecturer.courses.view',$course->id)}}" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$course->title}}</a> /&nbsp;
									<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$material->title}}</a>
								</div>

								<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
									<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
												<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
											</svg>
										</span>
										{{count(optional($course->level)->students)}} Students
									</a>
									<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
												<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
											</svg>
										</span>
										{{optional($course->level)->level}}
									</a>
								</div>
							</div>
						</div>
						
						<div class="d-flex flex-wrap flex-stack mb-2">
							<div class="d-flex flex-column flex-grow-1 pe-8">
								<div class="d-flex flex-wrap">
									<button onclick="openMaterial()" class="btn btn-primary btn-sm">View Material</button> &nbsp;
									<button onclick="openExam()" class="btn btn-primary btn-sm">View Exam</button>&nbsp;
									<button onclick="openQuestion()" class="btn btn-primary btn-sm">Add Question</button>&nbsp;
									<a href="{{route('lecturer.courses.students.all', $course->id)}}" class="btn btn-sm btn-primary me-3">View Students</a>
								</div>
							</div>
						</div>
						@if (session('success'))
							<div class="alert alert-success">{{session('success')}}</div>
						@endif

						@if (session('error'))
							<div class="alert alert-warning">{{session('error')}}</div>
						@endif
					</div>
				</div>

			</div>
		</div>
		

		{{-- Material Area --}}
		<div id="materialArea" class="row g-5 g-xxl-8">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<iframe src="{{$material->video_link}}" style="width: 100%; height: 35em"  frameborder="0" allowfullscreen frameborder="0"></iframe>

						<div class="mt-4">
							<h4>Transcript</h4>
							{!! $material->description !!}
						</div>
					</div>

					
				</div>
			</div>
		</div>
		<br>
		

		{{-- Exam Area --}}
		<div class="row g-5 g-xxl-8">
			<div class="col-xl-6"  id="examArea" style="display: none">
				<div class="card mb-5 mb-xxl-8">
					<div class="card-body pb-0">
						<div class="d-flex align-items-center">
							<div class="d-flex align-items-center flex-grow-1">
								<div class="d-flex flex-column">
									<a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">Set Exam</a>
									<span class="text-gray-400 fw-bold">Enter exam details</span>
									<br/>
								</div>
							</div>
						</div>
						
						<form method="POST" action="{{route('lecturer_materials_exams_update', [$material->id, $material->exam->id])}}" enctype="multipart/form-data" id="kt_forms_widget_1_form" class="ql-quil ql-quil-plain pb-3">
							@csrf
							@method('PATCH')
							
							<div class="form-group mb-3">
								<label for="title">Title</label>
								<input class="form-control" type="text" name="title" required value="{{old('title') ?: $material->exam->title}}">
								@error('title')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>

							<label for="">Instruction</label>
							<div id="kt_forms_widget_1_editor_toolbar" class="ql-toolbar d-flex flex-stack py-2">
								<div class="me-2">
									<span class="ql-formats ql-size ms-0">
										<select class="ql-size w-75px"></select>
									</span>
									<span class="ql-formats">
										<button class="ql-bold"></button>
										<button class="ql-italic"></button>
										<button class="ql-underline"></button>
										<button class="ql-strike"></button>
										<button class="ql-image"></button>
										<button class="ql-link"></button>
										<button class="ql-clean"></button>
									</span>
								</div>
								<div class="me-n3">
									<span class="btn btn-icon btn-sm btn-active-color-primary">
										<i class="flaticon2-clip-symbol icon-ms"></i>
									</span>
									<span class="btn btn-icon btn-sm btn-active-color-primary">
										<i class="flaticon2-pin icon-ms"></i>
									</span>
								</div>
							</div>


							<div id="kt_forms_widget_1_editor" class="py-6 px-2 border border-secondary" style="min-height: 9em">{!! old('description') ?: $material->exam->description !!}</div>
							@error('description')
								<p class="text-warning">{{$message}}</p>	
							@enderror

							<input type="hidden" name='description' id='description'>
							
							<div class="form-group mt-2">
								<button class="btn btn-primary" type="submit">Submit</button>
								<button class="btn btn-secondary" type="button" onclick='openQuestion()'>Add Question</button>
							</div>
						</form>
						
						
					</div>
					<!--end::Body-->
				</div>
				
			</div>

		{{-- question Area --}}
			<div class="col-xl-6" id="questionArea" style="display: none">
				<div class="card mb-5 mb-xxl-8">
					<div class="card-body pb-0">
						<div class="d-flex align-items-center">
							<div class="d-flex align-items-center flex-grow-1">
								<div class="d-flex flex-column">
									<a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">Add Question</a>
									<span class="text-gray-400 fw-bold">Enter question details</span>
									<br/>
								</div>
							</div>
						</div>
						
						<form method="POST" action="{{route('lecturer_exams_question_store', [$material->exam->id])}}">
							@csrf
							
							<div class="form-group mb-3">
								<label for="question">Question</label>
								<input class="form-control" type="text" name="question" required value="{{old('question')}}">
								@error('question')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>

							<div class="form-group mb-3">
								<label for="points">Points</label>
								<input class="form-control" type="text" name="points" required value="{{old('points')}}">
								@error('points')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>

							<div class="form-group mb-3">
								<label for="">Option A</label>
								<input class="form-control" type="text" name="option1" value="{{old('option1')}}">
								@error('option1')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>
							<div class="form-group mb-3">
								<label for="">Option B</label>
								<input class="form-control" type="text" name="option2" value="{{old('option2')}}">
								@error('option2')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>
							<div class="form-group mb-3">
								<label for="">Option C</label>
								<input class="form-control" type="text" name="option3" value="{{old('option3')}}">
								@error('option3')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>
							<div class="form-group mb-3">
								<label for="">Option D</label>
								<input class="form-control" type="text" name="option4" value="{{old('option4')}}">
								@error('option4')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>
							
							<div class="form-group mb-3">
								<label for="is_answer">Choose Correct Option</label>
								<select class="form-control" name="is_answer" id="is_answer">
									<option value="1">Option A</option>
									<option value="2">Option B</option>
									<option value="3">Option C</option>
									<option value="4">Option D</option>
								</select>
							</div>

							<div class="form-group mt-2">
								<button class="btn btn-primary" type="submit">Submit</button>
								<button class="btn btn-secondary" type="button" onclick='openExam()'>View Exam</button>
							</div>
						</form>
						
						
					</div>
					<!--end::Body-->
				</div>
				
			</div>
			<!--end::Col-->
			<div class="col-xl-6">
				
				<div class="card mb-5 mb-xxl-8">
					<!--begin::Header-->
					<div class="card-header align-items-center border-0 mt-4">
						<h3 class="card-title align-items-start flex-column">
							<span class="fw-bolder mb-2 text-dark">Materials Questions</span>
							<span class="text-muted fw-bold fs-7">{{count(optional($material->exam)->questions)}} Questions Added</span>
						</h3>
					</div>
					
					<div class="card-body pt-5">						
						@forelse ($material->exam->questions as $i => $question)
							<div class="timeline-labe mb-3">
								<div class="timelinem">
									<div class="">
										<span class="timeline-labe fw-bolder text-gray-800">{{$i + 1}}.</span>
										{{$question->question}} -- {{$question->points}} points
									</div>
									<div>
										@forelse ($question->options as $option)
											@if ($option->is_answer == 1)
													<span class="text-success">{{$option->option}}</span>
											@endif
										@empty
											
										@endforelse
									</div>
								</div>
							</div>	
						@empty
							
						@endforelse
						<!--end::Timeline-->
					</div>
					
				</div>
			</div>
			<!--end::Col-->
		</div>
		
	</div>
</div>

@endsection


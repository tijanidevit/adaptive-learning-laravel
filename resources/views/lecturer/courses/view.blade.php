@extends('lecturer.layout.main')
@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="container-xxl" id="kt_content_container">

		<div class="card mb-5 mb-xxl-8">
			@if (session('success'))
				<div class="alert alert-success">{{session('success')}}</div>
			@endif
			
			@if (session('error'))
				<div class="alert alert-warning">{{session('error')}}</div>
			@endif

			<div class="card-body pt-9 pb-0">
				<!--begin::Details-->
				<div class="d-flex flex-wrap flex-sm-nowrap">
					<!--begin: Pic-->
					<div class="me-7 mb-4">
						<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
							<img src="{{asset('storage/courses/images/'.$course->thumbnail)}}" alt="image" />
							<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
						</div>
					</div>
					<!--end::Pic-->
					<!--begin::Info-->
					<div class="flex-grow-1">
						<!--begin::Title-->
						<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
							<!--begin::User-->
							<div class="d-flex flex-column">
								<!--begin::Name-->
								<div class="d-flex align-items-center mb-2">
									<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$course->title}}</a>
								</div>
								<!--end::Name-->
								<!--begin::Info-->
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
									<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
								</div>
								<!--end::Info-->
							</div>
							<!--end::User-->
							<!--begin::Actions-->
							<div class="d-flex my-4">
								
								<a href="{{route('lecturer.courses.students.all', $course->id)}}" class="btn btn-sm btn-primary me-3">View Students</a>
								<!--begin::Menu-->
								<div class="me-0">
									<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
										<i class="bi bi-three-dots fs-3"></i>
									</button>
									<!--begin::Menu 3-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
										<!--begin::Heading-->
										<div class="menu-item px-3">
											<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Students</div>
										</div>
										
										<div class="menu-item px-3">
											<a href="{{route('lecturer.courses.students.all', $course->id)}}" class="menu-link px-3">Students</a>
										</div>
										
										<div class="menu-item px-3">
											<a href="{{route('lecturer.courses.students.performances', $course->id)}}" class="menu-link flex-stack px-3">Students' Performances
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Displays each student's performances"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="d-flex flex-wrap flex-stack">
							<div class="d-flex flex-column flex-grow-1 pe-8">
								<div class="d-flex flex-wrap">
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<div class="d-flex align-items-center">
											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{count(optional($course->level)->students)}}" data-kt-countup-prefix="">0</div>
										</div>
										
										<div class="fw-bold fs-6 text-gray-400">Students</div>
										
									</div>
									
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{count($course->materials)}}">0</div>
										</div>
										<div class="fw-bold fs-6 text-gray-400">Materials</div>
										<!--end::Label-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				

				<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
					
					<li class="nav-item mt-2">
						<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#">Overview</a>
					</li>					
				</ul>
			</div>
		</div>
		
		
		<div class="row g-5 g-xxl-8">
			<div class="col-xl-6">
				<div class="card mb-5 mb-xxl-8">
					<div class="card-body pb-0">
						<!--begin::Header-->
						<div class="d-flex align-items-center">
							<!--begin::User-->
							<div class="d-flex align-items-center flex-grow-1">
								<!--begin::Info-->
								<div class="d-flex flex-column">
									<a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">Add Course Material</a>
									<span class="text-gray-400 fw-bold">Enter material details</span>
									<br/>
								</div>
								<!--end::Info-->
							</div>
							
						</div>
						
						<form method="POST" action="{{route('lecturer_courses_materials_store',$course->id)}}" enctype="multipart/form-data" id="kt_forms_widget_1_form" class="ql-quil ql-quil-plain pb-3">
							@csrf
							@if (session('success'))
								<div class="alert alert-success">{{session('success')}}</div>
							@endif
							<div class="form-group mb-3">
								<label for="title">Title</label>
								<input class="form-control" type="text" name="title" required value="{{old('title')}}">
								@error('title')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>
							
							<div class="form-group mb-3">
								<label for="image">Image</label>
								<input class="form-control" type="file" accept="image/*" name="image" required value="{{old('image')}}">
								@error('image')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>
							
							<div class="form-group mb-3">
								<label for="video_link">Video link</label>
								<input class="form-control" type="text" name="video_link" required value="{{old('video_link')}}">
								@error('video_link')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>
							
							<div class="form-group mb-3">
								<label for="duration">Duration</label>
								<input class="form-control" type="text" name="duration" required value="{{old('duration')}}">
								@error('duration')
								<p class="text-warning">{{$message}}</p>	
								@enderror
							</div>
							
							
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


							<div id="kt_forms_widget_1_editor" class="py-6 px-2 border border-secondary" style="min-height: 9em">{!! old('description') !!}</div>
							@error('description')
								<p class="text-warning">{{$message}}</p>	
							@enderror

							<input type="hidden" name='description' id='description'>
							
							<div class="form-group mt-2">
								<button class="btn btn-primary" type="submit">Submit</button>
							</div>
						</form>
						
						
					</div>
					<!--end::Body-->
				</div>
				
			</div>
			<!--end::Col-->
			<div class="col-xl-6">
				@if (session('error'))
					<div class="alert alert-warning">{{session('error')}}</div>
				@endif
				<div class="card mb-5 mb-xxl-8">
					<!--begin::Header-->
					<div class="card-header align-items-center border-0 mt-4">
						<h3 class="card-title align-items-start flex-column">
							<span class="fw-bolder mb-2 text-dark">Course Materials</span>
							<span class="text-muted fw-bold fs-7">{{count($course->materials)}} Materials Added</span>
						</h3>
					</div>
					
					<div class="card-body pt-5">						
						@forelse ($course->materials as $i => $material)
							<div class="timeline-label mb-3">
								<div class="timeline-item">
									<div class="timeline-label fw-bolder text-gray-800 fs-6">{{$i + 1}}</div>
									<div class="timeline-badge">
										<i class="fa fa-genderless text-warning fs-1"></i>
									</div>
									<div class="fw-mormal timeline-content ps-3"><a href="{{route('lecturer.courses.materials.view', [$material->course->id,$material->id])}}">{{$material->title}}</a></div>
								</div>
							</div>	
						@empty
							
						@endforelse
						<!--end::Timeline-->
					</div>
					<!--end: Card Body-->
				</div>
			</div>
			<!--end::Col-->
		</div>
		
	</div>
</div>

@endsection


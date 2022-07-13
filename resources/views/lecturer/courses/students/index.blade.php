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
									<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">Students</a>
								</div>

								<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
									<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
												<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
											</svg>
										</span>
										{{count($students)}} Students
									</a>
                                    
								</div>
							</div>
						</div>
						
						
						@if (session('success'))
							<div class="alert alert-success">{{session('success')}}</div>
						@endif

						@if (session('error'))
							<div class="alert alert-warning">{{session('error')}}</div>
						@endif

                        <div class="card-body py-3">
                            <div class="table-responsive">
                              <!--begin::Table-->
                              <table id="myTable" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                  <thead>
                                    <tr>
                                      <th>Fullname</th>
                                      <th>Email</th>
                                      <th>Matric Number</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  
                                  <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                          <td>{{optional($student->user)->fullname}}</td>
                                          <td>{{optional($student->user)->email}}</td>
                                          <td>{{$student->matric_no}}</td>
                                          <td><a href="{{route('lecturer.courses.students.individual.performances',[$course->id, $student->id])}}">View performances</a></td>
                                        </tr>
                                    @empty
                                    @endforelse
                                  </tbody>
                              </table>
                              <!--end::Table-->
                            </div>
                          </div>
					</div>
				</div>

			</div>
		</div>
		
		<br>
		
		
	</div>
</div>

@endsection
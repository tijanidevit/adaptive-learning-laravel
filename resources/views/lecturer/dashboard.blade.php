@extends('lecturer.layout.main')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <div class="container-xxl" id="kt_content_container">
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
      <!--begin::Col-->
      <div class="col-xl-6">
        <!--begin::Mixed Widget 13-->
        <div class="card card-xl-stretch mb-xl-10" style="background-color: #f7d9e3">
          <div class="card-body d-flex flex-column">
            <div class="d-flex flex-column flex-grow-1">
              <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Students</a>
              <div class="mixed-widget-13-chart" style="height: 100px"></div>
            </div>
            <div class="pt-5">
              <span class="text-dark fw-bolder fs-2x lh-0"></span>
              <span class="text-dark fw-bolder fs-3x me-2 lh-0">{{$total_students}}</span>
            </div>
          </div>
        </div>
      </div>
      
  
      <div class="col-xl-6">
        <!--begin::Mixed Widget 14-->
        <div
          class="card card-xxl-stretch mb-xl-10" style="background-color: #cbf0f4"
        >
          <!--begin::Body-->
          <div class="card-body d-flex flex-column">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-grow-1">
              <!--begin::Title-->
              <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Courses</a>
              <!--end::Title-->
              <!--begin::Chart-->
              <div class="mixed-widget-14-chart" style="height: 100px"></div>
              <!--end::Chart-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Stats-->
            <div class="pt-5">
              <!--begin::Number-->
              <span class="text-dark fw-bolder fs-3x me-2 lh-0">{{$total_courses}}</span>
            </div>
            <!--end::Stats-->
          </div>
        </div>
        <!--end::Mixed Widget 14-->
      </div>
      
    </div>
    <!--end::Row-->
    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-10">
      <!--begin::Header-->
      <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label fw-bolder fs-3 mb-1">Lecturers </span>
        </h3>
        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user"
        >
          
        </div>
      </div>
      <!--end::Header-->
      <!--begin::Body-->
      <div class="card-body py-3">
        <div class="table-responsive">
          <!--begin::Table-->
          <table id="myTable" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
              <thead>
                <tr>
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Course Code</th>
                  <th>Level</th>
                  <th>Units</th>
                  <th>Action</th>
                </tr>
              </thead>
              
              <tbody>
                @forelse ($courses as $course)
                    <tr>
                      <td><img height="70" src="{{asset('storage/courses/images/'.$course->course->thumbnail)}}" alt="{{$course->course->title}}"></td>
                      <td>{{optional($course->course)->title}}</td>
                      <td>{{$course->course->code}}</td>
                      <td>{{optional($course->course->level)->level}}</td>
                      <td>{{optional($course->course)->title}}</td>
                      <td><a class="btn btn-info btn-sm" href="{{route('lecturer.courses.view',$course->course_id)}}">View</a></td>
                    </tr>
                @empty
                @endforelse
              </tbody>
          </table>
          <!--end::Table-->
        </div>
      </div>
      <!--begin::Body-->
    </div>
  </div>
</div>
@endsection
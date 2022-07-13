@extends('lecturer.layout.main')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <div class="container-xxl" id="kt_content_container">
   
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
                @forelse ($lecturer_courses as $course)
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
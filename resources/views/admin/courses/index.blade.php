@extends('admin.layout.main')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Container-->
<div class="container-xxl" id="kt_content_container">
 
  <div class="card mb-5 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bolder fs-3 mb-1">Courses List</span>
        <span class="text-muted mt-1 fw-bold fs-7"> {{count($courses)}} Courses</span>
      </h3>
      <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a course">
        <a href="{{route('admin.courses.create')}}" class="btn btn-sm btn-light btn-active-primary">
          <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
          <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
            </svg>
          </span>
          <!--end::Svg Icon-->New Course</a
        >
      </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
      @if (session('success'))
          <div class="alert alert-success">{{session('success')}}</div>
      @endif
      <div class="table-responsive">
        <!--begin::Table-->
        <table id="myTable" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
            <thead>
              <tr>
                <th>Title</th>
                <th>Code</th>
                <th>Level</th>
                <th>Units</th>
                <th>Action</th>
              </tr>
            </thead>
            
            <tbody>
              @forelse ($courses as $course)
                  <tr>
                    <td>{{$course->title}}</td>
                    <td>{{$course->code}}</td>
                    <td>{{optional($course->level)->level}}</td>
                    <td>{{$course->units}}</td>
                    <td class="d-flex">
                      <a class="btn btn-info btn-sm" href="{{route('admin.courses.view', $course->id)}}">View</a> &nbsp;
                      <form action="{{route('admin_courses_delete', $course->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
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
<!--end::Container-->
</div>
@endsection
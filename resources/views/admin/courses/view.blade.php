@extends('admin.layout.main')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Container-->
<div class="container-xxl" id="kt_content_container">
    <div class="card p-3 mb-5 text-center"> <h3>{{$course->title}}</h3></div>
    <div class="row">
    <div class="col-md-6">
      <div class="card mb-5 mb-xl-10">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
          <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Lecturers List</span>
            <span class="text-muted mt-1 fw-bold fs-7"> {{optional($course->lecturers)->count()}} Lecturers</span>
          </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-warning">{{session('error')}}</div>
            @endif
          <div class="table-responsive">
            <!--begin::Table-->
            <table id="" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <thead>
                  <tr>
                    <th>Lecturer</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  @forelse ($course->lecturers as $lecturer)
                      <tr>
                        <td>{{$lecturer->lecturer->user->fullname}}</td>
                        <td>
                          <form action="{{route('admin_lecturer_courses_delete', $lecturer->id)}}" method="POST">
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
    
    <div class="col-md-6">
      <div class="card mb-5 mb-xl-10">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
          <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Assign Lecturer</span>
            <span class="text-muted mt-1 fw-bold fs-7">Select the lecturer</span>
          </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
              <div class="form-group">
                    <form action="{{route('admin_lecturer_course')}}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="title">Lecturer</label>
                            <select name="lecturer_id" class="form-control" required>
                                @forelse ($lecturers as $lecturer)
                                    <option value="{{$lecturer->lecturer->id}}">{{$lecturer->lecturer->user->fullname}}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                            @error('lecturer')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="hidden" name="course_id" value="{{$course->id}}">

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </form>
              </div>
        </div>
        <!--begin::Body-->
      </div>
    </div>
  </div>
</div>
<!--end::Container-->
</div>
@endsection
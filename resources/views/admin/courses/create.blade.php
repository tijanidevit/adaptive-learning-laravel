@extends('admin.layout.main')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Container-->
<div class="container-xxl" id="kt_content_container">
 
  <div class="card mb-5 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bolder fs-3 mb-1">Add Courses</span>
        <span class="text-muted mt-1 fw-bold fs-7"> Enter Course Details</span>
      </h3>
      <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to view all courses">
        <a href="{{route('admin.courses.all')}}" class="btn btn-sm btn-light btn-active-primary">
          <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
          <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
            </svg>
          </span>
          <!--end::Svg Icon-->View Courses</a
        >
      </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
      <!--begin::Table container-->
      <div class="">
            <form action="{{route('admin_courses_store')}}" method="post">
                @csrf

                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" autofocus name="title" class="form-control" required value="{{old('title')}}">
                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="title">Code</label>
                    <input type="text" name="code" class="form-control" required value="{{old('code')}}">
                    @error('code')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="title">Units</label>
                    <input type="number" name="units" class="form-control" required value="{{old('units')}}">
                    @error('units')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="title">Level</label>
                    <select name="level_id" class="form-control" required>
                        @forelse ($levels as $level)
                            <option value="{{$level->id}}">{{$level->level}}</option>
                        @empty
                            
                        @endforelse
                    </select>
                    @error('level')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" required>{{old('description')}}</textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
      </div>
    </div>
    <!--begin::Body-->
  </div>
</div>
<!--end::Container-->
</div>
@endsection
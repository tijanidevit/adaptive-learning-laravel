@extends('admin.layout.main')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Container-->
<div class="container-xxl" id="kt_content_container">
 
  <div class="card mb-5 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
      <h3 class="card-email align-items-start flex-column">
        <span class="card-label fw-bolder fs-3 mb-1">Add Lecturers</span>
        <div><span class="text-muted mt-1 fw-bold fs-7"> Enter Lecturer Details</span></div>
      </h3>
      <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to view all lecturers">
        <a href="{{route('admin.lecturers.all')}}" class="btn btn-sm btn-light btn-active-primary">
          <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
          <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
            </svg>
          </span>
          <!--end::Svg Icon-->View lecturers</a
        >
      </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
      <!--begin::Table container-->
      <div class="">
            <form action="{{route('admin_lecturers_store')}}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="form-group mb-3">
                    <label for="fullname">Fullname</label>
                    <input type="text" autofocus name="fullname" class="form-control" required value="{{old('fullname')}}">
                    @error('fullname')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="staff_id">Staff ID</label>
                    <input type="text" name="staff_id" class="form-control" required value="{{old('staff_id')}}">
                    @error('staff_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required value="{{old('email')}}">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" accept="image/*" name="image" class="form-control" required value="{{old('image')}}">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="description">About</label>
                    <textarea name="about" class="form-control" required>{{old('about')}}</textarea>
                    @error('about')
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
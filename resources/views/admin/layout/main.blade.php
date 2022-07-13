<!DOCTYPE html>

<html lang="en">
  <meta
    http-equiv="content-type"
    content="text/html;charset=UTF-8"
  />
  
@include('admin.layout.head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  
<body id="kt_body" class="sidebar-enabled">
	<!--begin::Main-->
	<!--begin::Root-->
  <div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
      @include('admin.layout.sidebar')

    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
      @include('admin.layout.header')

      @yield('content')

      @include('admin.layout.footer')

    </div>

    </div>
  </div>
</body>
</html>

{{-- @include('admin.layout.add_lecturer_modal') --}}
@include('admin.layout.scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function(){
    $('#myTable').DataTable();
  });
</script>
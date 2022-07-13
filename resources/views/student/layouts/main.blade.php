<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "vertical","layout": "boxed", "behaviour": "unpinned" }, "storagePrefix": "elearning-portal"}'>

    @include('student.layouts.head')
    <body>
        
        <div id="root">
            @include('student.layouts.nav')

            @yield('content')

            @include('student.layouts.footer')

        </div>
    </body>
    @include('student.layouts.scripts')
</html>

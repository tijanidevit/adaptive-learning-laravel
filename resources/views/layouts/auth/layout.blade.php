<!DOCTYPE html>
<html lang="en">
    @include('layouts.auth.head')    

<body>
    @include('layouts.auth.header')
    @yield('content')
    @include('layouts.auth.footer')
</body>
</html>

@include('layouts.auth.scripts')
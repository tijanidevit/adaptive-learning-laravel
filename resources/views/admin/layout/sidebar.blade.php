<!--begin::Aside-->
<div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside"
data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
data-kt-drawer-toggle="#kt_aside_toggle">
<!--begin::Brand-->
<div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
    <!--begin::Logo-->
    <a href="{{route('admin.dashboard')}}">
        <img alt="Logo" height="1200" src="{{asset('fpi.jpg')}}" class="h-60px logo" />
    </a>
    <!--end::Logo-->
</div>
<!--end::Brand-->
<!--begin::Aside menu-->
<div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
    <!--begin::Aside Menu-->
    <div class="w-100 hover-scroll-overlay-y d-flex pe-2" id="kt_aside_menu_wrapper"
        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
        data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
        data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper"
        data-kt-scroll-offset="100">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded fw-bold my-auto" id="#kt_aside_menu"
            data-kt-menu="true">
            <div class="menu-item">
                <a class="menu-link active" href="{{route('admin.dashboard')}}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg')}}-->
                        <span class="svg-icon svg-icon-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                    fill="black" />
                                <path opacity="0.3"
                                    d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg')}}-->
                        <span class="svg-icon svg-icon-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                    fill="black" />
                                <path opacity="0.3"
                                    d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Courses</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.courses.create')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Course</span>
                        </a>
                    </div>
                    
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.courses.all')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Courses</span>
                        </a>
                    </div>

                </div>
            </div>

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg')}}-->
                        <span class="svg-icon svg-icon-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                    fill="black" />
                                <path opacity="0.3"
                                    d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Lecturers</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.lecturers.create')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Lecturer</span>
                        </a>
                    </div>
                    
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.lecturers.all')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Lecturer</span>
                        </a>
                    </div>

                </div>
            </div>

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg')}}-->
                        <span class="svg-icon svg-icon-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                    fill="black" />
                                <path opacity="0.3"
                                    d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Students</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.students.create')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Student</span>
                        </a>
                    </div>
                    
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.students.all')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Student</span>
                        </a>
                    </div>

                </div>
            </div>
     
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg')}}-->
                        <span class="svg-icon svg-icon-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                    fill="black" />
                                <path opacity="0.3"
                                    d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Authentication</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <form method="POST" action="{{route('logout')}}" class="menu-item">
                        @csrf
                        <button class="btn menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Logout</span>
                        </button>
                    </form>

                </div>
            </div>
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside menu-->
<!--begin::Footer-->
<div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">
    <!--begin::User panel-->
    <div class="d-flex flex-stack">
        <!--begin::Wrapper-->
        <div class="d-flex align-items-center">
            <!--begin::Avatar-->
            <div class="symbol symbol-circle symbol-40px">
                <img src="{{asset('hod.jfif')}}" alt="photo" />
            </div>
            <!--end::Avatar-->
            <!--begin::User info-->
            <div class="ms-2">
                <!--begin::Name-->
                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder lh-1">Mr. Oloruntoba</a>
                <!--end::Name-->
                <!--begin::Major-->
                <span class="text-muted fw-bold d-block fs-7 lh-1">Head of Department</span>
                <!--end::Major-->
            </div>
            <!--end::User info-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::User panel-->
</div>
<!--end::Footer-->
</div>
<!--end::Aside-->
<div id="nav" class="nav-container d-flex">
    <div class="nav-content d-flex">
        <div class="logo position-relative">
            <a href="{{route('student.dashboard')}}">
                FPI
            </a>
        </div>
        
        <div class="user-container d-flex">
            <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="profile" alt="profile" src="{{asset('storage/students/images/'.auth()->user()->image)}}">
                <div class="name">{{auth()->user()->fullname}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end user-menu wide">
                <div class="row mb-3 ms-0 me-0">
                    <div class="col-12 ps-1 mb-2">
                        <div class="text-extra-small text-primary">ACCOUNT</div>
                    </div>
                    <div class="col-12 pe-1 ps-1">
                        <ul class="list-unstyled">
                            <li>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">
                                        <i data-cs-icon="logout" class="me-2" data-cs-size="17"></i>
                                        <span class="align-middle">Logout</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul class="list-unstyled list-inline text-center menu-icons">
            <li class="list-inline-item">
                <a href="#" id="colorButton">
                    <i data-cs-icon="light-on" class="light" data-cs-size="18"></i>
                    <i data-cs-icon="light-off" class="dark" data-cs-size="18"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                    <div class="position-relative d-inline-flex">
                        <i data-cs-icon="bell" data-cs-size="18"></i>
                        <span class="position-absolute notification-dot rounded-xl"></span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                    <div class="scroll">
                        <ul class="list-unstyled border-last-none">
                            <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                                <img src="img/profile/profile-1.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="...">
                                <div class="align-self-center">
                                    <a href="#">Joisse Kaycee just sent a new comment!</a>
                                </div>
                            </li>
                            <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                                <img src="img/profile/profile-2.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="...">
                                <div class="align-self-center">
                                    <a href="#">New order received! It is total $147,20.</a>
                                </div>
                            </li>
                            <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                                <img src="img/profile/profile-3.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="...">
                                <div class="align-self-center">
                                    <a href="#">3 items just added to wish list by a user!</a>
                                </div>
                            </li>
                            <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
                                <img src="img/profile/profile-6.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="...">
                                <div class="align-self-center">
                                    <a href="#">Kirby Peters just sent a new message!</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>


        <div class="menu-container flex-grow-1">
            <ul id="menu" class="menu">
                <li>
                    <a href="{{route('student.dashboard')}}">
                        <i data-cs-icon="home-garage" class="icon" data-cs-size="18"></i>
                        <span class="label">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.dashboard')}}">
                        <i data-cs-icon="online-class" class="icon" data-cs-size="18"></i>
                        <span class="label">Courses</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.exams.all')}}">
                        <i data-cs-icon="quiz" class="icon" data-cs-size="18"></i>
                        <span class="label">Quizzes</span>
                    </a>
                </li>
                
                {{-- <li>
                    <a href="{{route('student.messages.all')}}">
                        <i data-cs-icon="lecture" class="icon" data-cs-size="18"></i>
                        <span class="label">Messages</span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="#instructors">
                        <i data-cs-icon="lecture" class="icon" data-cs-size="18"></i>
                        <span class="label">Lecturers</span>
                    </a>
                    <ul id="instructors">
                        <li>
                            <a href="Instructor.List.html">
                                <span class="label">List</span>
                            </a>
                        </li>
                        <li>
                            <a href="Instructor.Detail.html">
                                <span class="label">Detail</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>


        
        <div class="mobile-buttons-container">
            <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
                <i data-cs-icon="menu-dropdown"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
            <a href="#" id="mobileMenuButton" class="menu-button">
                <i data-cs-icon="menu"></i>
            </a>
        </div>
    </div>
    <div class="nav-shadow"></div>
</div>
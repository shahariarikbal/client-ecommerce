
            <header id="header" class="header header-floating header-floating-text-dark">
                <div class="header-nav navbar-sticky navbar-sticky-animated">
                    <div class="header-nav-wrapper">
                        <div class="container">
                            <nav id="menuzord-right" class="menuzord default no-bg">
                                <a class="menuzord-brand switchable-logo pull-left flip mb-15" href="{{ url('/') }}">
                                    <img class="logo-default" src="{{asset('frontend')}}/logo/logo.png" alt="" />
                                    <img class="logo-scrolled-to-fixed" src="{{asset('frontend')}}/logo/logo.png" alt="" />
                                </a>
                                <ul class="menuzord-menu">
                                    <li class="active">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('/about-us') }}">About Us</a>
                                    </li>
                                    <li class="">
                                        <a href="#">Administration</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{ url('/chairman-message') }}">Chairman Message</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/principal-message') }}">Principal Message</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('administrative') }}">Administrative</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('faculty') }}">Faculty Members</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="#">Academic</a>

                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{ url('/academic/calendar') }}" class="text-capitalize">calendar</a>
                                            </li>
                                            <li>

                                                <a href="{{ url('/academic/class-routine') }}" class="text-capitalize">class routine</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/academic/exam-routine') }}" class="text-capitalize">exam routine</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/academic/public-exam-result') }}" class="text-capitalize">Public Exam Result</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/academic/institutional-result') }}" class="text-capitalize">Institutional Result</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/academic/course-structure') }}" class="text-capitalize">Course Structure</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="#">Department</a>

                                        <ul class="dropdown">
                                            @foreach (App\Models\Department::orderBy('id', 'asc')->get() as $department)
                                            <li>
                                                <a href="{{ url('/department/' . $department->slug ) }}">{{$department->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="#">Admission</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{ url('/admission/admission-circular') }}">Admission Circular</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/admission/admission-form') }}">Admission Form</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/admission/admission-requirement') }}">Admission Requirement</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/admission/prospectus') }}">Prospectus</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/admission/fee') }}">Fee</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('/list/notice') }}">Notice</a>
                                    </li>
                                    <li class="">
                                        <a href="#">Facilities</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{ url('facilities/lab') }}">Our Lab Facilities</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('facilities/hostel') }}">Hostel Facilities</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('facilities/scholarship') }}">Scholarship</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('facilities/job') }}">Job Placement Centre</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="#">Gallery</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{ url('gallery/photo') }}">Photo Gallery</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('gallery/video') }}">Video Gallery</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('list/archive') }}">Archive</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('contact') }}">Contact</a>
                                    </li>
                                    <li class="last-header-menu">
                                        <a href="#">Login</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{ url('admin/login') }}">Admin</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('teacher/login') }}">Teacher</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('student/login') }}">Student</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('stuff/login') }}">Stuff</a>
                                            </li>
                                    </li>
{{--                                     <li class="">
                                        <a href="#">Dropdown</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="#">Multipage Layouts</a>
                                                <ul class="dropdown">
                                                    <li><a href="{{ url('/') }}">Layout1</a></li>
                                                    <li><a href="index-mp-layout2.html">Layout2</a></li>
                                                    <li><a href="index-mp-layout3.html">Layout3</a></li>
                                                    <li><a href="index-mp-layout4.html">Layout4</a></li>
                                                    <li><a href="index-mp-layout5.html">Layout5</a></li>
                                                    <li><a href="index-mp-layout6.html">Layout6</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Singlepage Layouts</a>
                                                <ul class="dropdown">
                                                    <li><a href="index-sp-layout1.html">Layout1</a></li>
                                                    <li><a href="index-sp-layout2.html">Layout2</a></li>
                                                    <li><a href="index-sp-layout3.html">Layout3</a></li>
                                                    <li><a href="index-sp-layout4.html">Layout4</a></li>
                                                    <li><a href="index-sp-layout5.html">Layout5</a></li>
                                                    <li><a href="index-sp-layout6.html">Layout6</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Boxed Layouts</a>
                                                <ul class="dropdown">
                                                    <li><a href="index-boxed-mp-layout1.html">Multipage Layout1</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">RTL Layouts</a>
                                                <ul class="dropdown">
                                                    <li><a href="index-rtl-mp-layout1.html">Multipage Layout1</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Dark Layouts</a>
                                                <ul class="dropdown">
                                                    <li><a href="index-dark-mp-layout1.html">Multipage Layout1</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Home Variations</a>
                                                <ul class="dropdown">
                                                    <li>
                                                        <a href="#">Rev Slider</a>
                                                        <ul class="dropdown">
                                                            <li><a href="index-home-variation-revslider-style1.html">Layout1</a></li>
                                                            <li><a href="index-home-variation-revslider-style2.html">Layout2</a></li>
                                                            <li><a href="index-home-variation-revslider-style3.html">Layout3</a></li>
                                                            <li><a href="index-home-variation-revslider-style4.html">Layout4</a></li>
                                                            <li><a href="index-home-variation-revslider-style5.html">Layout5</a></li>
                                                            <li><a href="index-home-variation-revslider-style6.html">Layout6</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#">Maximage Slider</a>
                                                        <ul class="dropdown">
                                                            <li><a href="index-home-variation-maximageslider-style1.html">Layout1</a></li>
                                                            <li><a href="index-home-variation-maximageslider-style2.html">Layout2</a></li>
                                                            <li><a href="index-home-variation-maximageslider-style3.html">Layout3</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="index-home-variation-owl-carousel.html">Owl Carousel</a></li>
                                                    <li><a href="index-home-variation-owl-image-slider.html">Owl Image Slider</a></li>
                                                    <li><a href="index-home-variation-typed-text.html">Typed Text Layout</a></li>
                                                    <li><a href="index-home-variation-video-background.html">Youtube Background Video</a></li>
                                                    <li><a href="index-home-variation-html5-video.html">Html5 Background Video</a></li>
                                                    <li><a href="index-home-variation-bg-image-parallax.html">Bg Image Parallax Layout</a></li>
                                                    <li><a href="index-home-variation-bg-static.html">Bg Static Layout</a></li>
                                                    <li>
                                                        <a href="#">Home Appointment Form</a>
                                                        <ul class="dropdown">
                                                            <li><a href="index-home-variation-appointment-form-style1.html">Layout1</a></li>
                                                            <li><a href="index-home-variation-appointment-form-style2.html">Layout2</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>

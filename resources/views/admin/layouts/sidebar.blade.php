
<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('public/backend/assets/images/carimage3.jpg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Learn Driving</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('dashboard') }}" class="">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Blogs</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.blogcate') }}"><i class="bx bx-right-arrow-alt"></i>Blog Category Manage</a>
                </li>
                <li> <a href="{{ route('index.blog') }}"><i class="bx bx-right-arrow-alt"></i>Blog List</a>
                </li>
                <li> <a href="{{ route('deactive.blog.list') }}"><i class="bx bx-right-arrow-alt"></i>Deactive Blog List</a>
                </li>
               {{--  <li> <a href="{{ route('admin.schedule') }}"><i class="bx bx-right-arrow-alt"></i>Schedule</a>
                </li> --}}
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Courses</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.package') }}"><i class="bx bx-right-arrow-alt"></i>Package Manage</a>
                </li>
                <li> <a href="{{ route('admin.car') }}"><i class="bx bx-right-arrow-alt"></i>Car Manage</a>
                </li>
                <li> <a href="{{ route('create.course') }}"><i class="bx bx-right-arrow-alt"></i>Add Course</a>
                </li>
                <li> <a href="{{ route('index.course') }}"><i class="bx bx-right-arrow-alt"></i>All Course</a>
                </li>
                <li> <a href="{{ route('deactive.course.list') }}"><i class="bx bx-right-arrow-alt"></i>Deactive Course List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.contact.messages') }}" class="">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Contact Messages</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.faq') }}" class="">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Faqs</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.about') }}" class="">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">About</div>
            </a>
        </li>
        <li class="menu-label">UI Elements</li>
        <li>
            <a href="{{ route('setting') }}" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Setting</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
@php
$setting = App\Models\Admin\Setting::first();
@endphp
<header class=" fixed-top">
    <div class="header_top">
        <div class="container-fluid">
            <div class="row align-items-center g-3">
                <div class="col-lg-6 mobilenone">
                    <div class="header_location d-flex justify-content-between">
                        <div class="location_box">
                            <i class="fa-solid fa-envelope-open me-1"></i>
                            <span class="fw-bold">@if($setting) {{ $setting->email }} @endif</span>
                        </div>
                        <div class="header_icon">
                            <a href="@if($setting) {{ $setting->fb_link }} @endif"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="@if($setting) {{ $setting->twitter_link }} @endif"><i class="fa-brands fa-twitter"></i></a>
                            <a href="@if($setting) {{ $setting->instagram_link }} @endif"><i class="fa-brands fa-instagram"></i></a>
                            <a href="@if($setting) {{ $setting->youtube_link }} @endif"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact_box text-end d-flex align-items-center justify-content-end">
                        <i class="fa-solid fa-phone me-2"></i>
                        <a class="fw-bold" @if($setting) href="tel:{{ $setting->phone }}" @else href="#" @endif>@if($setting) {{ $setting->phone }} @endif</a>
                        <a  @if($setting) href="tel:{{ $setting->phone }}" @else href="#" @endif class="btn btn-warning btn-sm ms-4 px-3 fw-bold text-white">Call Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light bg-light py-2">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('/') }}">Learn to Drive</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav menu ms-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses') }}">Driving Courses East London</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="review.html">Review</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faqs') }}">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

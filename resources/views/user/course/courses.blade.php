@extends('layouts.app')
@section('title','Driving course')
@section('content')  

    <div class="inner_banner py-5">
        <div class="container-fluid">
            <h2>Driving Courses East London </h2>
        </div>
    </div>



    <div class="east_london_page px-3 py-5 my-5">
        <div class="container-fluid">
            <div class="course_container">
                <div class="row g-3">
                	@foreach($courses as $course)
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ route('course.single',$course->slug) }}">
                            <div class="card border-0 shadow">
                                <img src="{{ asset('storage/app/public/'.$course->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title">{{ Str::words($course->title,'3','..') }}</h3>
                                    <h3 class="price"> &pound;600 - &pound;1900 </h3>
                                    <a href="" class="btn my_btn btn-primary">Select Options</a>
                                </div>
                            </div>
                        </a>
                    </div>

                	@endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
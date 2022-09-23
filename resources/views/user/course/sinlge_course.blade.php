@extends('layouts.app')
@section('title','Driving course')
@section('content')  


    <div class="product_details_page px-3 py-5 my-5">
        <div class="container-fluid">
            <div class="card">
                <div class="container-fliud">
                        <form action="{{ route('course.booking') }}" method="POST" enctype="multipart/form-data">
                    <div class="wrapper row" id="myTable">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                            @csrf
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                  <div class="tab-pane active" id="pic-1"><img src="{{ asset('storage/app/public/'.$course->image) }}" /></div>
                                </div>                            
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">{{ $course->title }}</h3>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <span class="review-no">41 reviews</span>
                                </div> <h4 class="price">current price: <span>&pound;600 - &pound;1700</span></h4>
                               	{!! $course->summary !!}
                                {{--
                                <p class="vote"><strong>91%</strong> of users enjoyed this course! <strong>(87 votes)</strong></p>
                                <p>If you are a beginner and would like to start from the basic driving skills, then our Beginner Driving Course will be perfect for you.</p>
                                <ul class="my-4">
                                    <li>Beginner Lessons can start immediately</li>
                                    <li>Typically takes 6-8 weeks (2-5hrs per lesson)</li>
                                    <li>Payment Instalment options available</li>
                                </ul> --}}
                                <div class="details_input">
                                    <label class="fw-bold mb-2" for="package">Choose A Package</label>
                                    <select class="form-control mb-4 txtCal" name="package_id" style="box-shadow: none;" id="package" required>
                                        <option value="">Choose A Package</option>
                                        @foreach($course->package as $package)
                                        <option value="{{ $package->amount }}">{{ $package->time }}-Hours</option>
                                        @endforeach
                                    </select>
                                </div>

                                @php 
                                @endphp
                                <div class="details_input">
                                    <label class="fw-bold mb-2" for="carType" >Type of Car</label>
                                    <select class="form-control mb-4 txtCal"  required name="car_id" style="box-shadow: none;" id="carType">
                                        <option value="">Choose A Option</option>
                                        @foreach($course->car as $car)
                                        <option value="{{ $car->amount }}" @if($car->name == "Automatic") selected @endif>{{ $car->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="details_input">
                                    <label class="fw-bold mb-2" for="assistance">Practical Driving Test Assistance (hire a car on your test day)</label>
                                    <select class="form-control mb-4 txtCal" name="assistant" style="box-shadow: none;" id="assistance"  required>
                                        <option value="">Choose A Option</option>
                                        <option value="120" >Yes</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                                <h3 class="price_count fw-bold mb-4 " id="total_sum_value"><strike class="text-muted">&pound;960.00</strike> &pound;900.00 </h3>

                        <input type="number" name="amount" value="100" id="sum" class="form-control" readonly />
                                <div class="details_input">
                                    <label class="fw-bold mb-2" for="start-date">Preferred start date*</label>
                                    <input class="form-control mb-4" type="date"  required name="start_date" id="start-date">
                                </div>
                                <div class="details_input">
                                    <label class="fw-bold mb-2" for="carType">Preferred time slot*</label>
                                    <select class="form-control mb-4" name="time_slot" style="box-shadow: none;" id="carType"  required>
                                        <option value="9am-12noon">9am-12noon</option>
                                        <option value="12noon-3pm" selected>12noon-3pm</option>
                                        <option value="3px-6pm">3px-6pm</option>
                                        <option value="6pm-9pm">6pm-9pm</option>
                                    </select>
                                </div>
                                <div class="action">
                                    <button class="add-to-cart btn btn-default">add to cart</button>
                                    <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                                </div>
                            </div>
                            </div>
                        </form>
                    <div class="row wrapper">
                    	<div class="tabs">
						  <div class="tabs-nav">
						    <div class="d-flex justify-content-start mb-3 text-dark">
							    <a href="#tab-1" class="text-dark"><h5 class="p-2">Description</h5></a>
							    <div class="vr" style="border-left: 1px solid #fb5607; height:40px;"></div>
							    <a href="#tab-2" class="text-dark"><h5 class="p-2">Additional Details</h5></a>
							</div>
						  </div>
						  <hr>
						  <div class="tabs-stage">
						    <div id="tab-1">
						    	<h6>Description</h6>
						      {!! $course->description !!}
						    </div>
						    <div id="tab-2">
						    	<h6>Additional Details</h6>
						      {!! $course->additional !!}
						    </div>
						  </div>
						</div>

                    </div>
                </div>
            </div>


            <div class="related_product mt-5">
                <h4 class="fw-bold mb-3">Related Product</h4>
                <div class="course_container">
                    <div class="row g-3">
                        <div class="col-md-4 col-sm-6">
                            <a href="#">
                                <div class="card p-0 m-0 border-0 shadow">
                                    <img src="assets/image/cart-image.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h3 class="card-title">Beginner Driving Course</h3>
                                        <h3 class="price"> &pound;600 - &pound;1900 </h3>
                                        <a href="#" class="btn my_btn btn-primary">Select Options</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a href="#">
                                <div class="card p-0 m-0 border-0 shadow">
                                    <img src="assets/image/cart-image.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h3 class="card-title">Beginner Driving Course</h3>
                                        <h3 class="price"> &pound;600 - &pound;1900 </h3>
                                        <a href="#" class="btn my_btn btn-primary">Select Options</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a href="#">
                                <div class="card p-0 m-0 border-0 shadow">
                                    <img src="assets/image/cart-image.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h3 class="card-title">Beginner Driving Course</h3>
                                        <h3 class="price"> &pound;600 - &pound;1900 </h3>
                                        <a href="#" class="btn my_btn btn-primary">Select Options</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
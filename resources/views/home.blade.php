@php
$setting = App\Models\Admin\Setting::first();
$about = App\Models\Admin\About::first();
@endphp
@extends('layouts.app')
@section('title','Home')
@section('content')  
<section class="banner mt-5">
    <div class="container-fluid">
      <div class="row gy-5">
        <div class="col-lg-6">
          <div class="banner_left">
            <h6>Driving School</h6>
            <h1>@if($setting) {{ $setting->title }} @endif</h1>
            <p>@if($setting) {{ $setting->about }} @endif</p>
            <button class="btn btn-success my_btn">Book Now</button>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="banner_right">
            <div class="banner_image m-auto">
              <img class="tire" src="{{ asset('public/frontend/assets/image/hero-shape-2.png') }}" alt="tire">
              <img class="car" src="@if($setting) {{ asset('storage/app/public/'.$setting->cover_image) }} @endif" alt="car">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner section ends -->


  <div class="start_course  mb-4">
    <div class="container-fluid">

      <div class="form_container  shadow-sm">

           @if(session('success'))
                  <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                       <div class="d-flex align-items-center">
                           <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                           </div>
                           <div class="ms-3">
                               <h6 class="mb-0 text-white">Success</h6>
                               <div class="text-white">{{ session('success') }}</div>
                           </div>
                       </div>
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
                  @endif 
                  @if(session('wrong'))
                  <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                      <div class="d-flex align-items-center">
                          <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                          </div>
                          <div class="ms-3">
                               <h6 class="mb-0 text-white">Wrong</h6>
                              <div class="text-dark">{{ session('wrong') }}</div>
                          </div>
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif 
        <h4>REQUEST A CALLBACK</h4>
        <form action="{{ route('contact.create') }}" method="POST">
        @csrf
          <div class="imputBox">
            <span>Your Name</span>
            <input type="text" placeholder="Name" name="name" required>
          </div>
          <div class="imputBox">
            <span>Your Email</span>
            <input type="email" placeholder="Email" name="email" required>
          </div>
          <div class="imputBox">
            <span>Your Phone</span>
            <input type="text" placeholder="Phone" name="phone" required>
          </div>
          <input type="hidden" name="status" value="3">
          <input type="submit" value="Callback" class="btn">
        </form>
      </div>
    </div>
  </div>


  <!-- about section starts  -->

  <section class="about mt-5 py-5">
    <div class="container-fluid">
      <div class="row align-items-center g-md-3 g-lg-5">
        <div class="col-lg-5">
          <div class="about_image">
            <img src="@if($about) {{ asset('storage/app/public/'.$about->image) }} @endif" alt="about">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="about_content mt-5 mt-lg-0">
            <h4>About Us</h4>
            <h1>@if($about) {{ $about->title }} @endif</h1>
            <p>{{ Str::words($about->about,'32','..') }}</p>
            @foreach($about->aboutmore as $aboutmore)
            <div class="about_box mt-2 rounded shadow-sm p-3">
              <div class="row">
                <div class="col-md-2  text-center">
                  <a href="#"><i class="fa-solid fa-check"></i></a>
                </div>
                <div class="col-md-10">
                  <h5>{{ $aboutmore->name }}</h5>
                  <p>{{ Str::words($aboutmore->detail,'30','..') }}
                    .</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- about section ends -->



  <!-- counter starts -->

  <div class="counter py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6 col-md-3">
          <div class="counter_box text-center">
            <h2>200+</h2>
            <span>Students</span>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="counter_box text-center">
            <h2>7</h2>
            <span>Years on the market</span>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="counter_box text-center">
            <h2>578</h2>
            <span>Training hours</span>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="counter_box text-center">
            <h2>32</h2>
            <span>Number of teachers</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- counter ends -->



  <!-- service section starts  -->

  <section class="service py-4">
    <div class="container-fluid">
      <div class="service_head text-center mb-5">
        <h5>Our Service</h5>
        <h1>We Offer Best Driving Courses</h1>
      </div>
      <div class="row gy-4">
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
          <div class="service_box">
            <div class="box_img mb-4">
              <img src="assets/image/s1.jpg" alt="">
            </div>
            <div class="box_content text-center">
              <h4>Theory test</h4>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus.</p>
              <button class="btn btn-success">Book Now</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
          <div class="service_box">
            <div class="box_img mb-4">
              <img src="assets/image/s2.jpg" alt="">
            </div>
            <div class="box_content text-center">
              <h4>Theory test</h4>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus.</p>
              <button class="btn btn-success">Book Now</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
          <div class="service_box">
            <div class="box_img mb-4">
              <img src="assets/image/s3.jpg" alt="">
            </div>
            <div class="box_content text-center">
              <h4>Theory test</h4>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus.</p>
              <button class="btn btn-success">Book Now</button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
          <div class="service_box">
            <div class="box_img mb-4">
              <img src="assets/image/s4.jpg" alt="">
            </div>
            <div class="box_content text-center">
              <h4>Theory test</h4>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus.</p>
              <button class="btn btn-success">Book Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- service section ends -->




  <!-- faq section starts -->

  <section class="faq_section mt-5 py-5">
    <div class="container-fluid">
      <div class="row align-items-center g-md-3 g-lg-5">
        <div class="col-lg-7">
          <h5 class="mb-5 text-center">FAQs</h5>
          <div class="accordion  shadow-lg p-5 rounded m-auto accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Are automatic cars easier to drive?
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">When you are ready, your Safe Drive Instructor will arrange your test for you on payment of the Transport Booking Fee. Alternatively you can call our Central Booking Office, provide us with your learners permit number and payment details and we will arrange your test. You can book a test directly with Transport, however there is no guarantee that your specific Instructor is available at that time.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  How do I book my driving test?
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">This depends on the individual, as every student has different abilities, needs, levels of experience and different opportunities to practice. Be aware of anyone who “quotes” a number of lessons over the phone as it is impossible, without first assessing your current skill levels. Once one of our Driving Instructors have assessed your current skill level, ability and have ascertained how much practice you can obtain between lessons, we will be able to provide you with an accurate estimate.
                  Please keep in mind that you can never have too many lessons as the more professional training you have then the safer you will become prior to going solo.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  How do I book my driving test?
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">This depends on the individual, as every student has different abilities, needs, levels of experience and different opportunities to practice. Be aware of anyone who “quotes” a number of lessons over the phone as it is impossible, without first assessing your current skill levels. Once one of our Driving Instructors have assessed your current skill level, ability and have ascertained how much practice you can obtain between lessons, we will be able to provide you with an accurate estimate.
                  Please keep in mind that you can never have too many lessons as the more professional training you have then the safer you will become prior to going solo.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                  Accordion Item #3
                </button>
              </h2>
              <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                  Accordion Item #3
                </button>
              </h2>
              <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                  Accordion Item #3
                </button>
              </h2>
              <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="about_image">
            <img src="assets/image/about4.jpg" alt="about">
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- faq section ends -->


@endsection

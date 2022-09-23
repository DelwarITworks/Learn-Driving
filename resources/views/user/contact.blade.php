@extends('layouts.app')
@section('title','Contact')
@section('content')  

    <div class="inner_banner py-5">
        <div class="container-fluid">
            <h2>Contact Us</h2>
        </div>
    </div>


    <div class="contact_page px-3">
        <div class="container-fluid">
          <div class="row align-items-center g-5">
            <div class="col-md-5">
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
              <div class="contact_form">
                <form action="{{ route('contact.create') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                  @csrf
                  <h3>Make an Enquiry</h3>
                  <label for="name">Name*</label>
                  <input type="text" id="name" name="name" required>
                  <div class="invalid-feedback">
                    Please enter name.
                  </div>

                  <label for="email">Email*</label>
                  <input type="text" id="email" name="email" required>
                  <div class="invalid-feedback">
                    Please enter email.
                  </div>

                  <label for="phone">Phone*</label>
                  <input type="text" id="phone" name="phone" required>
                  <div class="invalid-feedback">
                    Please enter phone number.
                  </div>

                  <label for="contact_textarea">Message</label>
                  <textarea id="contact_textarea" name="description" required></textarea>
                  <div class="invalid-feedback">
                    Please enter message.
                  </div>
                  <div class="button_box text-center">
                    <button class="my_btn btn bnt-primary">Send Message</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-7 px-2">
              <div class="contact_details">
                <div class="top_box">
                  <h3>Contact Us</h3>
                  <p>Don’t wait any longer – get on the phone or book your first lesson online with us right away!</p>
                </div>

                <div class="contact_info">
                  <div class="row g-4">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="icon">
                            <a href="#"><i class="fa-solid fa-location-dot"></i></a>
                          </div>
                        </div>
                        <div class="col-sm-10">
                          <p class="m-0">Weekdays ...... 8AM to 8PM</p>
                          <p class="m-0">Saturdays ...... 9AM to 6PM</p>
                          <p class="m-0">Sundays:</p>
                          <p class="m-0">Online bookings only</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="icon">
                            <a href="#"><i class="fa-solid fa-calendar-days"></i></a>
                          </div>
                        </div>
                        <div class="col-sm-10">
                          <p class="m-0">@if($setting) {{ $setting->phone }} @endif</p>
                          <p class="m-0">@if($setting) {{ $setting->hotline }} @endif</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="icon">
                            <a href="#"><i class="fa-solid fa-phone"></i></a>
                          </div>
                        </div>
                        <div class="col-sm-10">
                          <p class="m-0">@if($setting) {{ $setting->title }} @endif</p>
                          <p class="m-0">@if($setting) {{ $setting->address }} @endif</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-sm-1">
                          <div class="icon">
                            <a href="#"><i class="fa-solid fa-envelope-open"></i></a>
                          </div>
                        </div>
                        <div class="col-sm-11">
                          <p class="m-0">@if($setting) {{ $setting->email }} @endif</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 mt-5">
                      <div class="contact_social">
                        <h4>Follow Us</h4>
                        <div class="social_icon">
                          <a href="@if($setting) {{ $setting->fb_link }} @endif"><i class="fa-brands fa-facebook-f"></i></a>
                          <a href="@if($setting) {{ $setting->twitter_link }} @endif"><i class="fa-brands fa-twitter"></i></a>
                          <a href="@if($setting) {{ $setting->instagram_link }} @endif"><i class="fa-brands fa-instagram"></i></a>
                          <a href="@if($setting) {{ $setting->youtube_link }} @endif"><i class="fa-brands fa-youtube"></i></a>
                          <a href="@if($setting) {{ $setting->email }} @endif"><i class="fa-solid fa-globe"></i></a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d277492.03683924273!2d91.96234611925586!3d24.83702023328494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375054d3d270329f%3A0xf58ef93431f67382!2sSylhet!5e0!3m2!1sen!2sbd!4v1652547089628!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('title','Contact')
@section('content')  

    <div class="inner_banner py-5">
        <div class="container-fluid">
            <h2>About Us</h2>
        </div>
    </div>

  <!-- about section starts  -->

  <section class="about mt-5 py-5">
    <div class="container-fluid">
      <div class="row align-items-center g-md-3 g-lg-5">
        <div class="col-lg-5" >
          <div class="about_image" >
            <img @if($about) src="{{ asset('storage/app/public/'.$about->image) }} "@endif alt="about">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="about_content mt-5 mt-lg-0">
            {{-- <h4>About Us</h4> --}}
            <h1>@if($about) {{ $about->title }} @endif</h1>
            <p>{{ $about->about }}</p>
            @if($about)
            @foreach($about->aboutmore as $aboutmore)
            <div class="about_box mt-2 rounded shadow-sm p-3">
              <div class="row">
                <div class="col-md-2  text-center">
                  <a href="#"><i class="fa-solid fa-check"></i></a>
                </div>
                <div class="col-md-10">
                  <h5>{{ $aboutmore->name }}</h5>
                  <p>{{ $aboutmore->detail }}
                    .</p>
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- about section ends -->

@endsection
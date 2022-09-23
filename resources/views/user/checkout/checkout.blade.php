@extends('layouts.app')

@section('title','Electro Home')
@section('customlink')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/css/mdb.min.css') }}">

@endsection
@section('content')

  <!--Main layout-->
  <main class="pt-1" style="margin-top: 100px;">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-4 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

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
         
           <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Success</h6>
                        <div class="text-white">{{ session('wrong') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif
        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form action="{{ route('booking.store') }}" method="post" class="card-body" >
              @csrf
              <!--Username-->
              {{-- <div class="md-form input-group pl-0 mb-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" name="phone" class="form-control py-0" placeholder="Please enter your phone number" aria-describedby="basic-addon1">
              </div> --}}

                                    <input type="hidden" name="course_id" value="{{ $course_id }}">
                                    <input type="hidden" name="package_id" value="{{ $package_id }}">
                                    <input type="hidden" name="car_id" value="{{ $car_id }}">
                                    <input type="hidden" name="assistant" value="{{ $assistant }}">
                                    <input type="hidden" name="start_date" value="{{ $start_date }}">
                                    <input type="hidden" name="time_slot" value="{{ $time_slot }}">
                                    <input type="hidden" name="amount" value="{{ $amount }}">
                                    {{-- <input type="text" name="quantity" value="{{ $quantity }}"> --}}

              <!--email-->
              <div class="md-form mb-5">
                <label for="first_name" class="">First Name</label>
                <input type="text" name="first_name" id="first_name" required class="form-control" placeholder="youremail@example.com">
              </div>
              <div class="md-form mb-5">
                <label for="last_name" class="">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="youremail@example.com">
              </div>
              <div class="md-form mb-5">
                <label for="email" class="">Email (optional)</label>
                <input type="text" name="email" id="email" class="form-control" required placeholder="youremail@example.com">
              </div>

              <div class="md-form mb-5">
                <label for="phone" class="">Phone</label>
                <input type="number" name="phone" id="phone" required class="form-control" placeholder="">
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <label for="address" class="">Address</label>
                <input type="text" name="address" required id="address" class="form-control" placeholder="For Example:House #123,Street #123,ABC Road,Lamapara,Sylhet,Sadar-3100.">
              </div>
              <!--address2-->
              <div class="md-form mb-5">
                <label for="address2" class="">Street (optional)</label>
                <input type="text" name="address2" id="address2" class="form-control" placeholder="">
              </div>

              <!--company-->
              <div class="md-form mb-5">
                <label for="company" class="">Company Name (optional)</label>
                <input type="text" name="company" id="company" class="form-control" placeholder="">
              </div>

              <!--country-->
              <div class="md-form mb-5">
                <label for="country" class="">Country</label>
                <input type="text" name="country" id="country" required class="form-control" placeholder="">
              </div>


              <!--Zip code-->
              <div class="md-form mb-5">
                <label for="Zip code" class="">City</label>
                <input type="number" name="city" id="city" class="form-control" placeholder="">
              </div>

              <div class="md-form mb-5">
                <label for="state" class="">State</label>
                <input type="text" name="state" id="state" class="form-control" placeholder="">
              </div>

              <div class="md-form mb-5">
                <label for="zip_code" class="">Zip code</label>
                <input type="text" name="zip_code" id="zip_code" class="form-control" placeholder="">
              </div>



              <div class="md-form mb-5">
                <label for="pay_by" class="">Pay by</label>
                <input type="text" name="pay_by" id="pay_by" required class="form-control" placeholder="">
              </div>

              <div class="md-form mb-5">
                <label for="additional" class="">Additional</label>
                <input type="text" name="additional" id="additional" class="form-control" placeholder="">
              </div>
              {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}
              <!--Grid row-->

              <hr>

              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="pay_by" name="pay_by" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="pay_by">Cash on delevery</label>
                </div>
              </div>
              
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span><a href="{{ URL::to('cartview') }}">
            <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span></a>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            
            <button class="btn btn-primary btn-block mb-0" >Proceed to pay</button>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <h5 class="" style="border-bottom:1px solid gray;">Order Summery</h5>
            </li>
       {{--      @foreach($viewcarts as $cart)
            <li class="list-group-item d-flex justify-content-between lh-condensed" style=" padding: 5px 20px;">
              <div>
                <h6 class="my-0 font-weight-bold">‎{{ $cart->name }}</h6>
              </div>
              <div class="col-md-4">
              <span class="text-muted" style="text-align:left;">‎৳{{ $cart->price }}</span>
            </div>
            </li>
            @endforeach --}}
            <li class="list-group-item d-flex justify-content-between lh-condensed" style=" padding: 5px 20px;">
              <div>
                <h6 class="my-0 font-weight-bold">‎Rimonnahid</h6>
              </div>
              <div class="col-md-4">
              <span class="text-muted" style="text-align:left;">‎112</span>
            </div>
            </li>
            
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BDT)</span>
              <strong>‎</strong>
            </li>
            <button class="btn btn-primary btn-block mb-0" >Proceed to pay</button>
          </ul>
          <!-- Cart -->

     

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
@endsection

@section('customscript')
  <!-- MDB core JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/popper.min.js" integrity="sha256-O17BxFKtTt1tzzlkcYwgONw4K59H+r1iI8mSQXvSf5k=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('public/frontend/assets/js/mdb.min.js') }}"></script>
@endsection
@extends('admin.layouts.app')

@section('content')

<div class="page-wrapper">
   <div class="page-content">
       <!--breadcrumb-->
       <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
           <div class="breadcrumb-title pe-3">FDT admin</div>
           <div class="ps-3">
               <nav aria-label="breadcrumb">
                   <ol class="breadcrumb mb-0 p-0">
                       <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                       </li>
                       <li class="breadcrumb-item active" aria-current="page">car Manage</li>
                   </ol>
               </nav>
           </div>
           <div class="ms-auto">
               <div class="btn-group">
                   <!-- Button trigger modal -->
                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal"><i class="fadeIn animated bx bx-plus"></i> Add New car</button>
               </div>
           </div>
       </div>
       <!--end breadcrumb-->

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

   @if($errors->any())
     @foreach ($errors->all() as $error)
        <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                </div>
                <div class="ms-3">
                    <div class="text-dark">Warning !! {{ $error }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
     @endforeach
   <hr/>
    @endif

       <h6 class="mb-0 text-uppercase">List of cars</h6>
       <hr/>
       <div class="card">
           <div class="card-body">
               <div class="table-responsive">
                   <table id="example2" class="table table-striped table-bordered">
                       <thead>
                           <tr>
                               <th>Sl</th>
                               <th>Course</th>
                               <th>Car</th>
                               <th>Price</th>
                               <th>Status</th>
                               <th>Edit</th>
                               <th>Delete</th>
                           </tr>
                       </thead>
                       <tbody>
                          @foreach($cars as $car)
                           <tr>
                              <td>{{ $count++ }}</td>
                              <td>{{ Str::words($car->course->title,'5','..') }}</td>
                              <td>{{ $car->name }}</td>
                              <td>{{ $car->amount }}</td>
                              <td> 
                                 @if($car->status == 1)
                                    <a class="btn btn-primary" href="{{ route('deactive.car',$car->id) }}">Active</a>
                                 @else
                                    <a class="btn btn-warning" href="{{ route('active.car',$car->id) }}">Deactive</a>
                                 @endif
                              </td>
                              <td>
                                <!-- Large modal -->
                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editcar{{ $car->id }}"><i class="bx bxs-edit"></i></button>
                                <!-- Small modal -->
                              </td>
                              <td>
                                 <a href="{{ route('delete.car',$car->id) }}" class="btn btn-xs waves-effect waves-light btn-danger" id="delete"><i class="lni lni-trash"></i></a>
                              </td>
                            <!-- Button trigger modal -->
                          </tr>

                            <!-- Modal create -->
                            <div class="modal fade" id="editcar{{ $car->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">car update form</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-8 mx-auto"> 
                                                    @if ($errors->any())
                                                         @foreach ($errors->all() as $error)
                                                            <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                                                    </div>
                                                                    <div class="ms-3">
                                                                        <div class="text-dark">Warning !! {{ $error }}</div>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                         @endforeach
                                                     @endif
                                                    <hr/>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="p-4 border rounded">
                                                               <form action="{{ route('update.car',$car->id) }}" method="post" class="row g-3 needs-validation" novalidate>
                                                                   @csrf
                                                                   
                                       <div class="col-md-12">
                                           <label for="validationCustom02" class="form-label">Select Course</label>
                                           <select type="text" name="course_id" class="form-control" required>
                                           	<option value="">Choose a option...</option>
                                           	@foreach($courses as $course)
                                           	<option value="{{ $course->id }}" @if($course->id == $car->course_id) selected @endif>{{ Str::words( $course->title,'7','..') }}</option>
                                           	@endforeach
                                           </select>

                                           <div class="invalid-feedback">Please choose a course</div>
                                       </div>
                                       <div class="col-md-12">
                                           <label for="validationCustom02" class="form-label">Car Name <small></small></label>
                                           <input type="text" class="form-control" id="name" name="name" value="{{ $car->name }}" required>
                                           <div class="invalid-feedback">Please enter car name</div>
                                       </div>
                                       <div class="col-md-12">
                                           <label for="validationCustom02" class="form-label">Price <small>(Max 11 character)</small></label>
                                           <input type="number" name="amount" value="{{ $car->amount }}" class="form-control" maxlength="11" required>
                                           <div class="invalid-feedback">Please enter price</div>
                                       </div>
                                      {{--  <div class="col-md-12">
                                           <label for="validationCustom02" class="form-label">Discount <small>(Max 2 character)</small></label>
                                           <input type="number" name="discount" class="form-control" maxlength="2" required>
                                           <div class="invalid-feedback">Please enter discount</div>
                                       </div> --}}
                                       <div class="col-12">
                                           <button class="btn btn-primary" type="submit">Submit form</button>
                                       </div>
                                                               </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                       </tbody>
                       <tfoot>
                           <tr>
                               <th>Sl</th>
                               <th>Course</th>
                               <th>Car</th>
                               <th>Price</th>
                               <th>Status</th>
                               <th>Edit</th>
                               <th>Delete</th>
                           </tr>
                       </tfoot>
                   </table>
               </div>
           </div>
       </div>

       <!-- Modal create -->
       <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog modal-lg">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title">New car Form</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <div class="row">
                           <div class="col-xl-8 mx-auto"> 
                               @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                       <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                           <div class="d-flex align-items-center">
                                               <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                               </div>
                                               <div class="ms-3">
                                                   <div class="text-dark">Warning !! {{ $error }}</div>
                                               </div>
                                           </div>
                                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                       </div>
                                    @endforeach
                                @endif
                               <hr/>
                               <div class="p-4 border rounded">
                                   <form action="{{ route('create.car') }}" method="post" class="row g-3 needs-validation" novalidate>
                                       @csrf
                                       <div class="col-md-12">
                                           <label for="validationCustom02" class="form-label">Select Course</label>
                                           <select type="text" name="course_id" class="form-control" required>
                                           	<option value="">Choose a option...</option>
                                           	@foreach($courses as $course)
                                           	<option value="{{ $course->id }}">{{ Str::words( $course->title,'7','..') }}</option>
                                           	@endforeach
                                           </select>

                                           <div class="invalid-feedback">Please choose a course</div>
                                       </div>
                                       <div class="col-md-12">
                                           <label for="validationCustom02" class="form-label">Car name <small>(Max 4 character)</small></label>
                                           <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                           <div class="invalid-feedback">Please enter car name</div>
                                       </div>
                                       <div class="col-md-12">
                                           <label for="validationCustom02" class="form-label">Price <small>(Max 11 character)</small></label>
                                           <input type="number" name="amount" value="{{ old('amount') }}" class="form-control" maxlength="11" required>
                                           <div class="invalid-feedback">Please enter price</div>
                                       </div>
                                      {{--  <div class="col-md-12">
                                           <label for="validationCustom02" class="form-label">Discount <small>(Max 2 character)</small></label>
                                           <input type="number" name="discount" class="form-control" maxlength="2" required>
                                           <div class="invalid-feedback">Please enter discount</div>
                                       </div> --}}
                                       <div class="col-12">
                                           <button class="btn btn-primary" type="submit">Submit form</button>
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                       
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

@endsection

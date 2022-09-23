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
                       <li class="breadcrumb-item active" aria-current="page">Practical about Manage</li>
                   </ol>
               </nav>
           </div>
           <div class="ms-auto">
               <div class="btn-group">
                   <!-- Button trigger modal -->
                   <a href="{{ route('dashboard') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal"> Dashboard</a>
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


       {{-- <h6 class="mb-0 text-uppercase">A</h6> --}}
       <hr/>
       <div class="card">
           <div class="card-body">
@if(!$about)
	<form action="{{ route('store.about') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<div class="form-group mt-4">
					<label>Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" placeholder="enter website title" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>
            <div class="col-md-12">
                <div class="form-group mt-4">
                    <label>About (max-limit: 600 character)</label>
                    <textarea class="form-control @error('about') is-invalid @enderror" value="{{ old('about') }}" name="about" placeholder="enter a short description for your website..."></textarea>
                    @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4 mt-4">
                <label for="">image</label>
                <input type="file" onchange="iconChange(this)" name="image" class="form-control">
                <img src="" id="icon">
            </div>


			<div class="col-md-12 my-4">
				<button type="submit" class="btn btn-primary btn-block col-md-12">Upload About Information</button>
			</div>
		</div>
	</form>

	@else

	<form action="{{ route('update.about',$about->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="row">
            <div class="ms-auto d-flex justify-content-end">
               <div class="btn-group">
                   <!-- Button trigger modal -->
                   <a href="{{ route('admin.aboutmore',$about->id) }}" class="btn btn-primary"><i class="fadeIn animated bx bx-plus" ></i> About More</a>
               </div>
           </div>
			<div class="col-md-12">
				<div class="form-group mt-4">
					<label>Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $about->title }}" name="title" placeholder="enter website title" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>

            <div class="col-md-12">
                <div class="form-group mt-4">
                    <label>About (max-limit: 600 character)</label>
                    <textarea class="form-control @error('about') is-invalid @enderror"  name="about" placeholder="enter a short description for your website...">{{ $about->about }}</textarea>
                    @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-4 mt-4">
                <label for="">image (60*60)</label>
                <input type="file" onchange="iconChange(this)" name="image" class="form-control @error('image') is-invalid @enderror">
                <input type="hidden" name="oldimage" value="{{ $about->image }}">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <img class="img-thumbnail mt-4" src="{{ asset('storage/app/public/'.$about->image) }}" id="icon" style="height: 120px;">
            </div>

			<div class="col-md-12 my-4">
				<button type="submit" class="btn btn-success btn-block col-md-12">Update Website Information</button>
			</div>
		</div>
	</form>

	@endif
           </div>
       </div>

   </div>
</div>
@endsection

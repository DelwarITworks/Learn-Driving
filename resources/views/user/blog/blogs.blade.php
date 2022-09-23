
@extends('layouts.app')
@section('title','Blog | FDTB')
@section('content')

    <div class="inner_banner py-5">
        <div class="container">
            <h2>Blog</h2>
        </div>
    </div>


    <div class="blog_page py-5 mt-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            	@foreach($blogs as $blog)
                <div class="col">
                  <div class="card">
                    <img src="{{ asset('storage/app/public/'.$blog->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title mb-3"><a href="#">{{$blog->title}}</a></h5>
                      <small>Posted on: {{ $blog->created_at->format('D m, Y') }}</small>
                      <p class="card-text text-muted mt-3">{!! Str::words($blog->description,'10','..') !!}</p>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
        </div>
    </div>
@endsection
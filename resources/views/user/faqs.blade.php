
@extends('layouts.app')
@section('title','Blog | FDTB')
@section('content')


  <div class="inner_banner py-5">
    <div class="container">
        <h2>FAQs</h2>
    </div>
  </div>


  <div class="faq_page">
      <div class="container">
        <div class="accordion  shadow-lg p-5 rounded w-75 m-auto accordion-flush" id="accordionFlushExample">
            @foreach($faqs as $faq)
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading{{ $faq->id }}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $faq->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $faq->id }}">
                {{ $faq->question }}
              </button>
            </h2>
            <div id="flush-collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $faq->id }}" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">{{ $faq->answer }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
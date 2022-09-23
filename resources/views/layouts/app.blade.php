<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@400;700&family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}"> --}}

  <title>@yield('title')</title>

</head>

<body>
@include('layouts.header')
  <!-- banner section starts -->

@yield('content')

  <!-- footer starts  -->

@include('layouts.footer')

  <!-- footer ends -->



  {{-- <link rel="stylesheet" href="{{ asset('public/frontend/assets/js/bootstrap.bundle.min.js') }}"> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script><script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
  </script>

{{-- single course tab --}}
  <script>
    // Show the first tab by default
    $('.tabs-stage div').hide();
    $('.tabs-stage div:first').show();
    $('.tabs-nav li:first').addClass('tab-active');

    // Change tab class and display content
    $('.tabs-nav a').on('click', function(event){
      event.preventDefault();
      $('.tabs-nav li').removeClass('tab-active');
      $(this).parent().addClass('tab-active');
      $('.tabs-stage div').hide();
      $($(this).attr('href')).show();
    });
  </script>

  {{--  --}}
    <script type="text/javascript">
      // updates total on each entry

$(document).ready(function() {

  $("#myTable").on('input', '.txtCal', function() {
    var calculated_total_sum = 0;

    $("#myTable .txtCal").each(function() {
      var get_textbox_value = $(this).val();
      if ($.isNumeric(get_textbox_value)) {
        calculated_total_sum += parseFloat(get_textbox_value);
      }
    });
    $("#total_sum_value").html(calculated_total_sum);
  });
});

  </script>
</body>

</html>
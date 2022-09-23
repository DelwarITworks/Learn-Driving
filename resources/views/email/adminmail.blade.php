<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container-fluid bg-red">
	<h5>Your apply for driving test booking is successfull.</h5>
	<h6>adminmails : </h6>
<label></label> <label>{{ $adminmails['title'] }}</label><br>
<label>Centre Name :</label> <label>{{ $adminmails['centre_name'] }}</label><br>
<label>Practical Exam Date :</label> <label>{{ $adminmails['centre_date'] }}</label><br>
<label>Paid :</label> <label>{{ $adminmails['paid'] }}</label><br>
<label>Name :</label> <label>{{ $adminmails['name'] }}</label><br>
<label>License :</label> <label>{{ $adminmails['license'] }}</label><br>
<label>Address :</label> <label>{{ $adminmails['address'] }}</label><br>
<label>Post Code :</label> <label>{{ $adminmails['postcode'] }}</label><br>
<label>Email :</label> <label>{{ $adminmails['email'] }}</label><br>
<label>Mobile :</label> <label>{{ $adminmails['mobile'] }}</label><br>
<label>Theory Certificate Number :</label> <label>{{ $adminmails['tcertificate_num'] }}</label><br>
<label> Theory Expiry Date :</label> <label>{{ $adminmails['theory_expdate'] }}</label><br>
<label>Transmission :</label> <label>{{ $adminmails['transmission'] }}</label><br>
<label>Do you pass your theory test :</label> <label>{{ $adminmails['is_theory'] }}</label><br>
<label>Theory Test Number:</label> <label>{{ $adminmails['theorytest_no'] }}</label><br>
<label>Tracking ID :</label> <label class="text-bold">{{ $adminmails['track_id'] }}</label><br>
<label>Do you have a driving test already booked? :</label> <label>{{ $adminmails['is_booked'] }}</label><br>
<label>Previouse Booking Date :</label> <label>{{ $adminmails['pre_bookingdate'] }}</label><br>
{{-- <label>Name:</label> <label>{{ $adminmails['is_revoked'] }}</label><br> --}}
<label>Do you need any instructor :</label> <label>{{ $adminmails['need_instructor'] }}</label><br>
</body>
</html>
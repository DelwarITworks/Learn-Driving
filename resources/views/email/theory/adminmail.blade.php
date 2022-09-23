<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container-fluid bg-red">
	<h5>New Theory Test Booking from <span class="text-success">{{ $adminmails['email'] }}</span></h5>
	<h6>Person Details : </h6>
<label></label> <label>{{ $adminmails['title'] }}</label><br>
<label>Centre Name :</label> <label>{{ $adminmails['centre_name'] }}</label><br>
<label>Practical Exam Date :</label> <label>{{ $adminmails['centre_date'] }}</label><br>
<label>Centre REF ID :</label> <label class="text-bold">{{ $adminmails['ref_id'] }}</label><br>
<label>Paid :</label> <label>{{ $adminmails['paid'] }}</label><br>
<label>Name :</label> <label>{{ $adminmails['name'] }}</label><br>
<label>License :</label> <label>{{ $adminmails['license'] }}</label><br>
<label>Email :</label> <label>{{ $adminmails['email'] }}</label><br>
<label>Mobile :</label> <label>{{ $adminmails['mobile'] }}</label><br>
<label>Tracking ID :</label> <label class="text-bold">{{ $adminmails['track_id'] }}</label><br>
<label>Address :</label> <label>{{ $adminmails['address'] }}</label><br>
<label>Post Code :</label> <label>{{ $adminmails['postcode'] }}</label><br>
</body>
</html>
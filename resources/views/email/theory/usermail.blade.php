<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container-fluid bg-red">
	<h5>Your Theory Test Booking is successfull</h5>
	<h6>Person Details : </h6>
<label></label> <label>{{ $theorymail['title'] }}</label><br>
<label>Centre Name :</label> <label>{{ $theorymail['centre_name'] }}</label><br>
<label>Practical Exam Date :</label> <label>{{ $theorymail['centre_date'] }}</label><br>
<label>Paid :</label> <label>{{ $theorymail['paid'] }}</label><br>
<label>Name :</label> <label>{{ $theorymail['name'] }}</label><br>
<label>License :</label> <label>{{ $theorymail['license'] }}</label><br>
<label>Address :</label> <label>{{ $theorymail['address'] }}</label><br>
<label>Post Code :</label> <label>{{ $theorymail['postcode'] }}</label><br>
<label>Email :</label> <label>{{ $theorymail['email'] }}</label><br>
<label>Mobile :</label> <label>{{ $theorymail['mobile'] }}</label><br>
<label>Tracking ID :</label> <label class="text-bold">{{ $theorymail['track_id'] }}</label><br>
</body>
</html>
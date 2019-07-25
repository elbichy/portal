<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<h4>We are here!</h4>
	@foreach ($users as $user)
		{{ $user->firstname }}<br/>
	@endforeach
</body>
</html>
<!DOCTYPE HTML>
<html> 

<head>
    <meta charset="UTF-8">
	<title>Todo App</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
  <script src="js/app.js"></script>
	{{-- Asset returns the path to public folde --}}
</head>

<body>
	<div class="container">
		<!--Our main layout-->
		<!--We Include a file-->
		
		 @if(Session::has('global'))
		 <p style="color:red">{{Session::get('global')}}</p>

		 @endif
		        <!--But We yield specific content in a section of a file-->
		 @yield('content')

		 @yield("helloString")
	 </div>

</body>
</html>

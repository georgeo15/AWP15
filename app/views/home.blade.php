

@extends('layout.main')
	
@section('content')
     <span id="Welcome">SIGN IN OR REGISTER</span>
	@foreach ($errors->all() as $error)
		<p class="error">{{ $error }}</p>
	@endforeach

	{{ Form::open(array('autocomplete' => 'off')) }}

		<input class="hoverInput" type="text" name="username" placeholder="Username" />

		<input class="hoverInput" type="password" name="password" placeholder="Password" />
  
		<input type="submit" value="Sign in" /> 
       
 	{{ Form::close() }}



		@yield('content')
		{{-- Print out whatever is b/w section() & stop() tags wherever layouts.main is called. --}}
	    @include("layout.navigation")
      

 	


@stop


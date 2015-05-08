<!--We add this to our navigation to access it easily from there
Navigation file in layout folder-->


@extends('layout.main')

@section('content') 

<h1 style="color:white">Create new account</h1>

<!--<pre>{{print_r($errors)}}</pre> :But this not user friendly:Now we know it works,
	we can do it much better within each fieldd tag- using an inline if-->

<!--account-create-post-data':The URL name here doesn't matter as long 
	it's similar to what we defined in the routes.php-->
	<!---->
	
<form action="{{URL::route('account-create-post')}}" method="post">
	
	<div class="field_1 ">
		Email:<input type="text" name="email" {{(Input::old("email"))?  'value = " '.e(Input::old('email')).' " ':''}}/>
		@if($errors->has('email'))
		   <b>{{$errors->first('email')}}</b>
		 @endif
   
	</div>

	<div class="field_2 ">
		Username:<input type="text" name='username'/>

		@if($errors->has('username'))
		   <b>{{$errors->first('username')}}</b>
		 @endif

	</div>

	<div class="field_3 ">
		Password:<input type="password" name='password'/>
   	</div>

	<div class="field_4 ">
		Confrim Password:<input type="password" name='password_again'/>
   
	</div>

<div id="field_4">
<input type="submit" value="create account"/>
</div>

{{Form::token()}} <!--This is needed for CSRF token-->
</form>

@stop


<!---->

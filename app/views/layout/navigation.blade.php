

<nav style="display:inline;align:left;" >
	  <ul style="margin:6px">
		  
		  @if(Auth::check())  
			
			<!--Check if user  is signed in:do something--> 
			 <li style="display:inline;align:left;"> Sign out/change your password</li>

		  @else
		   
		    	<li> <input  id="singupBtn" type="button" value="Sign up" onClick="location.href='{{URL::route("account-create")}}'"/></li>

		  @endif

		 	  
				
     </ul>
</nav>
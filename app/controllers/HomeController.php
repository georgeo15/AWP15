<?php

	/*


	class HomeController extends BaseController {

	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	
	public function showWelcome()
	{
		//We write functionalities here
		//since we dont need the hello file we can delete it
		return View::make('hello');
	}

}

*/
/**********************************************************************************************/
////<<<<<<<<<<<<<<<I STARTED HERE>>>>>>>>>>>>>>>>>
//USING CONTROLLER INSTEAD OF DIRECT REFERENCING FROM THE ROUTES FILE TO GET HELLO File


class HomeController extends BaseController {

	//Creating a handler of the URL Created in the route file

    public function home(){
   
     // This returns the home.blade.php view in the view directory

     // return View::make('home');

     /***<<<<<ACCESSING DATABASE DATA USING USER MODULE>>>>>****/

     $user = User::find(1); ///Finding the data using the user ID
                                                          
     echo '<p>', print_r($user),'</p>';                  ///was just to test if we can use Eloquent
    
     //echo '<p>'$user = User::find(1)->username,'</p>'; ///Finding the specific data using the user name

    //Testing the mail model using static send method

  	/*
  	 Mail::send(
  		        'emails.auth.activate',array('name'=>'george'),
  		         function($message){

  		                     $message->to('george.ouma@metropolia.fi','george')->subject('Email Test'); //RECEIVER'S ADDRESS
  	                      }
  	    );
  	*/
  	     return View::make('home');
      
  }
}


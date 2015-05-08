<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|

//THIS DIRECT REFERENCING

Route::get('/', function()
{
	return View::make('hello');
});

*/

//<<<<<<<<<<<<<<<I STARTED HERE>>>>>>>>>>>>>>>>>
//THIS IS REFERENCING VIA HOMECONTROLLER

/*1-Setting the URL path using @ specifics to refer to home file*/

Route::get('/',array(
//We are accessing the Home.blade.php 'as'  home using homecontroller pointing(@) home()
 'as'    => 'home' ,               //this the home.blade file which is define as our root file
 'uses' => 'HomeController@home', //this is accessing specific method home() withing controller HomeControl

));



/*************************************************************
ALL THE OTHER WORK WE'VE BEEN DEALING WITH  THE ABOVE HOME ROUTE
**************************************************************/





/*****************************************************
//2-DEFINING A NEW AUTHENTICATED USER GROUP 
******************************************************/
     //Creating our create-account form :


    //A-CREATING unautheticated group of users

  Route::group(array('before' =>'guest'),function(){

    //B-Cross-side request forgery:CSRF protection
   Route::group(array('before' =>'csrf'),function() { 

    //C-CREATE AN ACCOUNT(POST)

      Route::post('/account/create',array(
      	      'as'    => 'account-create-post',
			        'uses'  => 'AccountController@postCreate'

          ));

  });

 	  /*CREATE AN ACCOUNT(GET):PAGE*/
     Route::get('/account/create',array(
      	     'as'    => 'account-create',            //this the file for creating accout
			       'uses'  => 'AccountController@getCreate' //Using accountcontrller property getcreate

          ));

     //*ACCOUNT ACTIVATE SESSION*

     Route::get('/account/activate/{code}',array(
        
        'as'   => 'account-activate',
        'uses' => 'AccountController@getActivate'

      ));
   

});

  Route::get('todos', function()
{
  return Todo::all();
  //return View::make('hello');
});








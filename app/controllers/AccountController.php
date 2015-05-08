<?php

class AccountController extends BaseController {
	
	 /*
      VIEWING THE FORM:
	  Returns the view of the form needed
	  for user to access/create the account
	   */
	public function getCreate(){
	 //Now we create our account view form
		return View:: make('account.create');

	}

   /*
  	SUBMITTING THE FORM:
  	Submits/Posts the users account records from the form
   */
  public function postCreate(){
     
     //print_r(Input::all());//checking the Input validation works
    //Now we build the validation and validation rules/case thro the array()
     $validator = Validator::make(Input::all(),
      array(  
             'email'                 =>'required|max:50|email|unique:users',
             'username'              =>'required|max:20|min:3|alpha_dash|unique:users',
             'password'              =>'required|min:6',
             'password_again'        =>'required|same:password'

        ));
     if ($validator->fails()){
      //die('Faled');
      //Lets do something sensible

         return Redirect::route('account-create')
         ->withErrors($validator)
         ->withInput();               //account-create:name defined for getCreate method
     }
     else{

         $email          = Input::get('email');
         $username       = Input::get('username');
         $password       = Input::get('password');

         //Activation code generated here

         $code =str_random(60); 

         $user = User::create(array(
          
          'email'     => $email,
          'username'  => $username,
          'password'  => Hash::make($password), //this give a hashed value to avoid and not plain text
          'code'      => $code,
          'active'    => 0


          ));
         

if($user){
  
          //Send email here
          Mail::send('emails.auth.activate',array('link'=>URL::route ('account-activate',$code),'username' => $username),


            function($message) use ($user){

                     //Here we define the receiver of the message
                      $message->to($user->email,$user->username)->subject('ACTIVATE YOUR ACCOUNT');
          });

          //********RE_DIRECT BACK TO THE HOMEVIEW***********************//
          //Global Defines the message area in the layout
           return Redirect::route('home')->with('global','Account Creation Successful.Check your email to activate it.');
        }


     
     }

    
  	//return View:: make('account.create.post');
  }


  /*Alternatively without seperating the logics,we can use:

   Route::controller('account','AccountController');

   This picks both post and get methods
  */

  
   public function getActivate($code){
     
     //Testing the activation code when user clicks the link//
    //return $code;

    //Now something Serious:Grabbing staff from database
    $user= User::where('code', '=', $code)->where('active', '=', 0); 
    
    //Checking if user is available
    if($user->count()){

         $user = $user->first();

          echo  '<pre>', print_r($user), '</pre>';

          //Updating user to active state:Code and active ares fields in the database
          $user->active  = 1;
          $user ->code   ='';

          if($user->update()){
                     
                 //IF THE ACTIVATING FAILS?
            return Redirect::route('home')
                    ->with('global','Activation Successful,now you can use your account');
                   }
            }
        //IF THE ACTIVATING FAILS?
            return Redirect::route('home')
                    ->with('global','Activation fail,try again');
   



   }
}



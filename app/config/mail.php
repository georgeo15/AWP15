<?php


//Mail configurations and defining contetnts
//Sender's info must well related with its autheticity rights in the host mail service
//This file is the most important,at the reciever's info in homecontroller,you can do whatever you want with it
//AT the senders:You have configure the driver,host,port,ecription and from-adddress
//The thing is is that the email is not sent directly from this application but through host gmail.com
//If we want to sent the email locally the we have to set the local emails at the local servers,but HOW?**

//me(app)->gmail.com->receiver


return array(
	
	 'driver' => 'smtp',
	 'host' => 'smtp.gmail.com',
	 //'host' => 'smtp.metropolia.fi',
	'port' => 465,
	
	'from' => array('address' => '', 'name' => 'whatever'), //The sender's address

	'encryption' => 'ssl',
	'username' =>'' ,     //Here we use this virtual system for connections
	'password' =>'',

	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,

);

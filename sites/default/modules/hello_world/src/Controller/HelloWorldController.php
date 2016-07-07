<?php

namespace Drupal\hello_world\Controller;

define('PARSE_SERVER_URL', 'https://iheart-parse-server.herokuapp.com/parse');
define('PARSE_APP_ID', 'MYNEWAPPID');
define('PARSE_REST_KEY', 'MYCLIENTKEY');
define('PARSE_MASTER_KEY', 'MYNEWMARTERKEY');

require 'parse/autoload.php';//'../../parse/autoload.php';
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;

class HelloWorldController {

	public function __construct(){
    	\Drupal::logger('hello world')->notice("__construct HelloWorldController");
  	}


    public function hello() {
    	// require 'parse/autoload.php';//'../../parse/autoload.php';
		/*
  		ParseClient::initialize(PARSE_APP_ID, PARSE_REST_KEY, PARSE_MASTER_KEY);
  		ParseClient::setServerURL(PARSE_SERVER_URL);

		$gameScore = new \Parse\ParseObject("GameScore50");
	  	$gameScore->set("score", 1337);
	  	$gameScore->set("playerName", "Sean Plott");
	  	$gameScore->set("cheatMode", false);
	  	try {
	   		$gameScore->save();
	    	echo 'New object created with objectId: ' . $gameScore->getObjectId();
	    		
	    	// Logs a notice
			\Drupal::logger('hello world')->notice('New object created with objectId: ' . $gameScore->getObjectId());
	  	} catch (ParseException $ex) {  
	    	// Execute any logic that should take place if the save fails.
	    	// error is a ParseException object with an error code and message.
	    	echo 'Failed to create new object, with error message: ' . $ex->getMessage();

	    	// Logs an error
			\Drupal::logger('hello world')->error('Failed to create new object, with error message: ' . $ex->getMessage());
	  	}
		*/
	  	
        return array(
                '#title' => 'Hello World!' . PARSE_SERVER_URL . "|" . __DIR__,
                '#markup' => 'Here is some content.',
            );

    }
}
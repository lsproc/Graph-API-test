<?php
	global $appid;
	global $appsecret;

	require('../constants.php');
	require('../fbapi/src/facebook.php');
	
	$facebook = new Facebook(array(
		'appId' => $appid,
		'secret' => $appsecret
	));

	// Obtain data from facebook, strstr
	$request_data = $facebook->getSignedRequest();
	
	// Facebook will provide the access token if the app is authenticated
	if (is_array($request_data) && array_key_exists('oauth_token', $request_data)) {
		$facebook->setAccessToken($request_data['oauth_token']);
	} elseif (!is_array($request_data)) {
		die('Not on Facebook');
	}
	
	$user = $facebook->getUser();

	// We can't obtain data from the /me node in the Facebook graph API if we are not authenticated
	// There must be a better way of doing this...
	try {
		$user_profile = $facebook->api('/me');
	} catch(FacebookApiException $e) {
		$user = null;
		echo 'We did not get permission to access the Facebook API';
		
		require('../pages/splash.php');
	}

	if($user) {
		// We are authenticated
		$name = $user_profile['name'];
		
		echo 'We have access to the Facebook API. Your name is: '.$name;
		
		require('../pages/index.php');
	}
	
	echo 'Get the code for this app at <a href="https://github.com/lsproc/Graph-API-test">Github</a>';

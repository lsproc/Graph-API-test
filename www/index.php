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
		// If we have not got any request data, we haven't come fom Facebook
		die('Not on Facebook');
	}
	
	$user = $facebook->getUser();
	
	// There is no user if we are unauthenticated for this app.
	if ($user == 0) {
		// Unauthenticated
		
		echo 'uid: 0 - unauthenticated';
		
		require('../pages/splash.php');
	} else {
		// We should have API access
		$user_profile = $facebook->api('/me');
		$name = $user_profile['name'];
		
		echo 'We have access to the Facebook API. Your name is: '.$name;
		
		require('../pages/index.php');
	}
	
	echo '<p>Get the code for this app at <a href="https://github.com/lsproc/Graph-API-test">Github</a></p>';

<?php
	global $appid;
	global $appsecret;

	require('../constants.php');
	require('../fbapi/src/facebook.php');
	
	$facebook = new Facebook(array(
		'appId' => $appid,
		'secret' => $appsecret
	));

	// Obtain data from facebook
	$request_data = json_decode(base64_decode(strtr($_POST['signed_request'], '-_', '+/')));
	
	// Facebook will provide the access token if the app is authenticated
	if (array_key_exists('oauth_token', $request_data))
	{
		$facebook->setAccessToken($request_data['oauth_token']);
	}
	
	$user = $facebook->getUser();

	// We can't obtain data from the /me node in the Facebook graph API if we are not authenticated
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
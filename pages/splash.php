<h1>Welcome to the test application for the Facebook API/OpenGraph</h1>
<p>You are seeing this message because this application does not have access to the Graph API. This is because the app is not authenticated for this user.</p>
<p>To authenticate (install) the application, click the link below. This should also grant access to post social activities to your stream.</p>
<?php
	/*
	 * Let's explain this.
	 * 
	 * The canvas page is the page where the iframe for the application exists. This has to be specified
	 * as otherwise we redirect straight to the app itself, which is not what we want. This must _not_ be
	 * urlencoded.
	 * 
	 * We don't want to redirect straight to the app itself as then we don't have the session data Facebook
	 * provides.
	 * 
	 * We use scope to specify what actions we want the application to have. publish_actions lets us say that
	 * 'Joe did Something'.
	 */
	global $canvaspage;
	$login_url = $facebook->getLoginUrl(array('scope' => 'publish_actions', 'redirect_uri' => $canvaspage));
?>
<p><a href="javascript:void(0);" onClick="top.location.href='<?php echo $login_url; ?>';">Install application</a></p>

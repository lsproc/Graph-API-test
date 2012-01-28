<h1>Welcome to the test application for the Facebook API/OpenGraph</h1>
<p>You are seeing this message because this application does not have access to the Graph API. This is because the app is not authenticated for this user.</p>
<p>To authenticate (install) the application, click the link below. This should also grant access to post social activities to your stream.</p>
<?php
	// Create login link (install the app link). We do this in JS so we can manipulate the frame that the app exists in (it is in an iframe), and we set the redirect link back to the app's page
	$canvaspage = urlencode('https://apps.facebook.com/philipgraphtest/');
?>
<p><a href="javascript:void(0);" onClick="top.location.href='<?php echo $facebook->getLoginUrl(array('scope' => 'publish_actions')); ?>';">Install application</a></p>
<p><a href="javascript:void(0);" onClick="top.location.href='https://www.facebook.com/dialog/oauth?client_id=<?php echo $facebook->getAppId(); ?>&redirect_uri=<?php echo $canvaspage; ?>&scope=publish_actions';">Install application (alternative way)</a></p>
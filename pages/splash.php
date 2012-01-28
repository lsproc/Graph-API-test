<h1>Welcome to the test application for the Facebook API/OpenGraph</h1>
<p>You are seeing this message because this application does not have access to the Graph API. This is because the app is not authenticated for this user.</p>
<p>To authenticate (install) the application, click the link below. This should also grant access to post social activities to your stream.</p>
<?php
	// Create login link (install the app link). We do this in JS so we can manipulate the frame that the app exists in (it is in an iframe), and we set the redirect link back to the app's page
	$canvas_url = 'https://www.facebook.com/apps/application.php?id='.$facebook->getAppId(); // No. It is not possible to just obtain the app URL from the graph API. That's because you need to be logged in. The number of periods in this sentence give an idea to my disatifaction with this.
?>
<p><a href="javascript:void(0);" onClick="top.location.href='<?php echo $facebook->getLoginUrl(array('scope' => 'publish_actions', 'redirect_uri' => urlencode($canvas_page))); ?>';">Install application</a></p>
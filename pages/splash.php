<h1>Welcome to the test application for the Facebook API/OpenGraph</h1>
<p>You are seeing this message because this application does not have access to the Graph API. This is because the app is not authenticated for this user.</p>
<p>To authenticate (install) the application, click the link below. This should also grant access to post social activities to your stream.</p>
<p><a href="<?php echo $facebook->getLoginUrl(array('scope' => 'publish_actions')); ?>">Install application</a></p>
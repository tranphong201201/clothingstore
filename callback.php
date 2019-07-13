<?php
require_once __DIR__ . '/vendor/autoload.php';
use Facebook\Authentication\AccessToken;
use Facebook\FacebookApp;
use Facebook\FacebookRequest;
session_start();
$app_id = '1765102186946779';
$app_secret = 'b3e75f6ec571b9b17956081e6f2e7d98';
$app = new FacebookApp($app_id, $app_secret);
$fb = new Facebook\Facebook(array(
    'app_id' => $app_id,
    'app_secret' => $app_secret,
    'default_graph_version' => 'v2.5',
));
//Page access token has been got from get_page_access_token.php
$access_token = '{PAGE ACCESS TOKEN}';
 
$page_id = '2300392873385136';
$post_data = array(
	'message' => '{CCCCCCCCCCC}'
	);
$request = new FacebookRequest($app, $access_token, 'POST', '/' . $page_id . '/feed', $post_data);
// Send the request to Graph
try {
  $response = $fb->getClient()->sendRequest($request);
  $graphNode = $response->getGraphNode();
  echo 'Post ID: ' . $graphNode['id'];
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
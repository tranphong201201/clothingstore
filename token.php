<?php

require_once __DIR__ . '/vendor/autoload.php';
session_start();
$fbData = array(
    'app_id' => '1765102186946779',
    'app_secret' => 'b3e75f6ec571b9b17956081e6f2e7d98',
    'profile_id' => '2300392873385136',
    'default_graph_version' => 'v2.5',
);
 
$fb = new Facebook\Facebook($fbData);
 
$params = array('req_perms' => 'manage_pages, publish_pages, public_profile');
$helper = $fb->getRedirectLoginHelper();
$loginUrl = $helper->getLoginUrl('http://fbsamples.local/callback.php', $params);
 
header('Location: '. $loginUrl);
exit;
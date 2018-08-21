<?php
	require_once __DIR__.'/Google_API/vendor/autoload.php';
	$client = new Google_Client();
	$client->setAuthConfig('client_secret.json');
	$client->setAccessType("offline");        // offline access
	$client->setIncludeGrantedScopes(true);   // incremental auth
	$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
	$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/callback.php');
	$auth_url = $client->createAuthUrl();
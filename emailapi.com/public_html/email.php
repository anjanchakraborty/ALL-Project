<!DOCTYPE html>
<html>
<head>
	<title>Email API</title>
</head>
<body>

<?php
// set API Access Key
$access_key = 'a41b9b841738235ee0f195a05bd13466';

// set email address

$email= $_POST["email"];

// Initialize CURL:
$ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email.'');  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$validationResult = json_decode($json, true);
echo "<pre>";print_r($validationResult);echo "</pre>";
/*// Access and use your preferred validation result objects
$validationResult['format_valid'];
$validationResult['smtp_check'];
$validationResult['score'];
$freeemail['free'];*/


//checking if email is valid or not
if ($validationResult['format_valid'] && $validationResult['smtp_check']&& !$validationResult['free']) {
	echo "Email is valid";
}
else{
	echo "Invalid email";
}

?>
</body>
</html>
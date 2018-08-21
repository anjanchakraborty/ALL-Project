<?php
	
	// Start the session
	session_start();
   	include 'config.php';
    

   	$client->authenticate($_GET['code']);
	$access_token = $client->getAccessToken();
	$client->setAccessToken($access_token);

	$name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $query = $_SESSION["query"];
    

    //reading sheet data
	
	/*$sheet = new Google_Service_Sheets($client);
	$spreadsheetId = '1EEVm1yTM7KzrqPPhWkQRMnjzwmrhuPGv-2yma17DrJU';
	$range = 'A2:H';
	$response = $sheet->spreadsheets_values->get($spreadsheetId, $range);
	$values = $response->getValues();
	if (empty($values)) {
    	print "No data found.\n";
	} else {
    	print "Data:\n";
    	foreach ($values as $row) {
        	// Print columns A and E, which correspond to indices 0 and 4.
        	 printf("%s, %s, %s", $row[0], $row[1],$row[2]);
    	}
	}*/

	

	//Writing values
    

$service = new Google_Service_Sheets($client);

// The ID of the spreadsheet to update.
$spreadsheetId = '1EEVm1yTM7KzrqPPhWkQRMnjzwmrhuPGv-2yma17DrJU';  
// TODO: Update placeholder value.

// The A1 notation of the values to update.

$range = 'A2:C2';  // TODO: Update placeholder value.
if(!empty($range)){


// TODO: Assign values to desired properties of `requestBody`. All existing
// properties will be replaced:
$requestBody = new Google_Service_Sheets_ValueRange([
    /*'values' => $values*/
    'range' => $range,
            'majorDimension' => 'COLUMNS',
            'values' => [['values' => $name],['values'=>$email],['values'=>$query]]
]);

$response = $service->spreadsheets_values->append($spreadsheetId, $range, $requestBody,['valueInputOption' => 'USER_ENTERED'],['responseValueRenderOption	
'=> 'FORMATTED_VALUE']);
echo "Data Written successful";
}
// destroy the session 
session_destroy(); 
// TODO: Change code below to process the `response` object:
/*echo '<pre>', var_export($response, true), '</pre>', "\n";*/
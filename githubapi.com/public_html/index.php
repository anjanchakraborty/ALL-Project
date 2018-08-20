<!DOCTYPE html>
<html>
<head>
	<title>Github API</title>
<style>
table{
	/*border-style:solid;*/
   /* border-width:2px;*/
    border: 1px solid black;
    border-collapse: collapse;
}
 th{
 	border: 1px solid black;
 	/*border-width:2px;*/
 }
 td{
 	border: 1px solid black;
 	/*border-width:2px;*/
 	/*float: none;*/
 }
.des{
  /*text-align:center;*/
  /*width:100%;*/

  }
</style>
</head>
<body>

<?php
/*
 $date = strtotime($date);
 $date = strtotime("+48 year", $date);
  /*echo $date;*/
  /*echo date('M d, Y', $date);*/ 

// Initialize CURL:
$ch = curl_init('https://api.github.com/search/repositories?q=created:>2018-08-01&sort=stars&order=desc');

//setting header
curl_setopt($ch, CURLOPT_HTTPHEADER, 'application/vnd.github.preview');
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');

curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);     //returntransfer must be caps
curl_setopt($ch,CURLOPT_CONNECTIONTIMEOUT,TRUE); 


// Store the data:
$json = curl_exec($ch);
curl_close($ch);


// Decode JSON response:
$result = json_decode($json,TRUE);
/*echo "<pre>";print_r($result);echo "</pre>";*/ //Displays the API response in JSON format
echo "<pre>";
// var_dump($result[items][0][owner][login]);


//Table

 echo "<table class='des'>"; 
   echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Star</th>";
    echo "<th>Language</th>";
    echo "<th>Build-By</th>";
   echo "</tr>";   
   
 
 $values = array();  //declaring array
//extracting required values from json result
foreach ($result[items] as $items => $value) {
  $values[] = ['Name'=>$value[name],'Star' => $value[stargazers_count],'Language' =>$value[language],'Build by' =>$value[full_name]];
    
       
   echo "<tr>";
     echo "<td>$value[name]</td>";
     echo "<td>$value[stargazers_count]</td>";
     echo "<td>$value[language]</td>";
     echo "<td>$value[full_name]</td>";
   echo "</tr>";
  
  


}
echo "</table>";
/*print_r($values);*/


?>
</body>
</html>
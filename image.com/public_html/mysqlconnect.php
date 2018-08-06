<?php

/**********MYSQL Settings****************/

mysqli_connect("localhost", "root", "anjan12345")or die("cannot connect to server");
mysqli_select_db("images")or die("cannot select DB");

?>
<!-- /**********MYSQL Settings****************/

  
//create connection
$conn = new mysqli($servername,$username,$pass);

 //check connection
echo "hello";
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
    echo "string";
}

echo "connected succesfully";

$db_selected = mysqli_select_db($databasename, $conn);

if (!$db_selected) {

    die ("Can't use foo : " . mysqli_error());

}



else

{

    die("Not connected : " . mysqli_error());

}


?> -->
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>

<?php 
     //Getting the inputs from user
 $first_name = $_POST["first_name"];
 $last_name = $_POST["last_name"];
 $email = $_POST["email"];
 $number = $_POST["number"];


 

 // Create connection
$conn = new mysqli("localhost", "root", "anjan12345", "images");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Inserting data into table -database
$sql = "INSERT INTO data (firstname, lastname, email, number)
VALUES ('$first_name', '$last_name' , '$email', '$number')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

///selecting all datas from table  and displaying it
$sql = "SELECT id, firstname, lastname, email, number FROM data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "  E-mail: " . $row["email"]. " Number:" . $row["number"]."<br>";
       

    }
   
} else {
    echo "0 results";
}

$conn->close();


?>

</body>
</html>

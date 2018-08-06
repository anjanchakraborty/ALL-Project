<?php

// Create connection
$conn = new mysqli("localhost", "root", "anjan12345", "images");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


 $sql = "SELECT id, path FROM image";
 $result = $conn->query($sql);

        if ($result->num_rows>0) {
			//output data of each row
           while ($row = $result->fetch_assoc()) {
           	echo "id:<br>".$row["id"]."<br>"."<img src=\"".$row['path']."\">  <br><br>";//displaying id and image.
          


          /* ?>Another way of displaying easy way
           <img src="<?php echo $row['path']?>">
           <?php*/


           }
          
         }
         else{
         	echo "Not uploaded";echo "Error: " . $sql . "<br>" . $conn->error;
            }
         $conn->close();  

?>
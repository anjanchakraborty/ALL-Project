<!DOCTYPE html>
<html>
<head>
  <title>Image upload</title>
</head>
<body>
<?php

 

 // Create connection
$conn = new mysqli("localhost", "root", "anjan12345", "images");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 //checking whether the variable is set or not
 if(isset($_POST['submit'])){
    $file=$_FILES['file'];  //Storing the file information in a variable using PHP superglobals $_FILES
     
     //Getting file information
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize =$_FILES['file']['size'];
    $fileError =$_FILES['file']['error'];
    $fileType =$_FILES['file']['type'];
    
    
    $fileExt = explode ('.',$fileName);      //Getting .extension
    $fileActualExt =strtolower(end($fileExt));   //Getting exact extension


    $allowed = array('jpg','jpeg','png');
    
    if(in_array($fileActualExt,$allowed)){              //checking file extension
       if ($fileError === 0) {                   //checking if error is generated while uploading in html
         //Cheching file size
         if ($fileSize<1000000) {
             $fileNameNew = uniqid('',true).".".$fileActualExt;   
             //Creating unique id by uniqid() to distinguish files while uploading which uses microsecond time of uploading as filename. First part is unique id then time in microseconds is concatenated and file extension concatenated with $fileActualExt
         
            $fileDestination = 'uploads/'.$fileNameNew;
            chmod("'uploads/'.$fileNameNew", 0777);
             move_uploaded_file($fileTmpName, $fileDestination);
             
             //Inserting data into table -database
          $sql = "INSERT INTO image (path) VALUES('$fileDestination')";

        if ($conn->query($sql) === TRUE) {
          echo "Your file upload was successfully <br><br>";
      
          /*echo "<img src='/home/anjan/Downloads/blog-thumb1.jpg'>";*/
         }else{echo "Not uploaded";echo "Error: " . $sql . "<br>" . $conn->error;}
              
         }else{echo "Your file is too big";}
         $conn->close();  
       }else{echo "There was an error uploading your file.";}

    }else{echo "You cannot upload files of this type.";}

    echo "<a href='imageshow.php'>Show image</a>";
 }
 ?>
</body>
</html>

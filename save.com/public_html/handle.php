

<?php 

 //Getting the inputs from user
 $first_name = $_POST["first_name"];
 $last_name = $_POST["last_name"];
 $email = $_POST["email"];
 $number = $_POST["number"];


//opening a file 

$myfile = fopen('Files/file.doc','w') or die('Unable to open file!');


//writing to a file
fwrite($myfile,"Name:". $first_name.$last_name."\n"."Email: ".$email."\n"."Phone number: ".$number."\n\n\n");
fclose($myfile);  //closing a file
 //redirecting to another php page for autodownloading the form submitted 
 header("Location: http://save.com/download.php");
   exit;

?>
<!-- <script>
function openNav() {
  var myForm = document.form;
    

   if (myForm.first_name.value == "" || myForm.last_name.value == "" || myForm.email.value == "" || myForm.number.value == "")
   {
      document.getElementById("myNav").style.width = "0%";
   }
   else
   {
      
      document.getElementById("myNav").style.width = "100%";
      myForm.first_name.value = "";
      myForm.last_name.value = "";
      myForm.email.value = "";
      myForm.number.value = "";
      window.location.href = "http://save.com/handle.php";
   }

    
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script> -->
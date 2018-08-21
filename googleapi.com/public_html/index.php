<?php
    // Start the session
    session_start();
    include 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Google Sheets</title>
    <style>
        .text{
            margin: 5em;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
  
 
    <form  method="post" enctype="multipart/form-data">  
  
      <div class="text">
          NAME :<input type="text" name="name" title="NAME" required="true">
      </div>
      
      <div class="text">
          E-mail :<input type="email" name="email"  title="E-mail" required="true">
      </div>
      
      <div class="text">
           Query:<input type="text" name="query"  title="Query" required="true">
      </div>
      
      <div class="text"><input type="submit" name="submit"></div>
      
   </form>

<?php 

    // Set session variables with user inputs
    $_SESSION["name"] = $_POST['name'];
    $_SESSION["email"] = $_POST['email'];;
    $_SESSION["query"] = $_POST['query'];
    
    //redirecting for authentication
    if (isset($_POST['submit'])) { 
       header('Location: '.$auth_url);
    }
?>
<!-- <a href="<?php echo $auth_url ?>">Submit</a> -->
</body>
</html>
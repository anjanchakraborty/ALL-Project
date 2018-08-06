<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>TEXTAREA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<style>
table{
	border-style:solid;
    border-width:2px;
    border-color:black;
}
 th{
 	border-style: solid;
 	border-width:2px;
 }
 td{
 	border-style: solid;
 	border-width:2px;
 }
.des{
  text-align:center;
  width:100%;

  }
.sub{
        text-align: center;
        
    }
</style>
</head>
<body>
<?php
 


  
  if(isset($_POST['submit'])){
	 $text=$_POST['marks'];
     
     $preg=preg_split("/[\n]/", $text);  // splitting into array on encountering next line.

     //getting subject name
     $e=explode('|',$preg[0]);
     $m=explode('|',$preg[1]);
     $p=explode('|',$preg[2]);
     $g=explode('|',$preg[3]);
  
     //getting marks
     $em=preg_split("/[|]/",$preg[0]);
     $mm=preg_split("/[|]/",$preg[1]);
     $pm=preg_split("/[|]/",$preg[2]);
     $gm=preg_split("/[|]/",$preg[3]);
   
    


  echo "<table class='des'>"; 
   echo "<tr>";
    echo "<th>$e[0]</th>";
    echo "<th>$m[0]</th>";
    echo "<th>$p[0]</th>";
    echo "<th>$g[0]</th>";
   echo "</tr>"; 
 
   echo "<tr>";
     echo "<td>$em[1]</td>";
     echo "<td>$mm[1]</td>";
     echo "<td>$pm[1]</td>";
     echo "<td>$gm[1]</td>";
   echo "</tr>";
  
  echo "</table>";




  }
?>

</body>
</html>





<?php 

//fuction pour se connecter a la base de donnees
function OpenCon() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "mesnotes";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
   }
    
   //fonction pour fermer la base de donnees
   function CloseCon($conn){
    $conn -> close();
   }

   function testerrr(){
    header("Location: index.php");
   }


?>
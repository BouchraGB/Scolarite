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

//register a new profile
if(isset($_POST['submitRegiter'])) {
    $conn = OpenCon();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $typeprofile = $_POST['typeprofile'];
    $email = $_POST['email'];
    $password1 = $_POST["password"];
    $password2 = $_POST["password2"];

    //1) verifier si username n'existe pas deja 
    $sql = "SELECT COUNT(*) from profile where email = $email";
    $result = $conn -> query($sql);

    if($result > 0){

        echo "email existe deja!";
    //2)verifier si le mot de passe est le meme
    }elseif($password1 != $password2){

        echo "mot de passe n'est pas le meme";

    }else{
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO profile (nom, prenom, email, motdepasse, typeprofile ) VALUES ('$nom', '$prenom', '$email', '$password','$typeprofile')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

    CloseCon($conn);

} 

//login to the site
elseif($_POST["submitLogin"]){
    $conn = OpenCon();

    $email = $_POST["email"];
    $password = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

    $sql = "SELECT count(*) from profile WHERE email = '$email' and motdepasse = '$password' ";

    $result = $conn -> query($sql);

    echo "$result->num_rows";

    if($result->num_rows > 0){

        $sql2 = "SELECT nom, prenom from profile WHERE email = '$email' ";

        $result2 = $conn -> query($sql2);

        $row = $result2->fetch_assoc();
        $nom = $row["nom"];
        $prenom = $row["prenom"];

        echo "welcome  $nom $prenom";
    }else {
        echo "pas de user";
    }

    CloseCon($conn);

}

   
?>
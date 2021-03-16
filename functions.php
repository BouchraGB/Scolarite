<?php

// Start the session
// session_start();

include 'db.php';

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

        // Set session variables pour garder les info de user
        $_SESSION["nom"] = $nom;
        $_SESSION["prenom"] = $prenom;
        $_SESSION["email"] = $email;

        //naviger a la page d'accueil
        header("Location: accueilEn.php");

    }else {
        echo "pas de user";
    }

    CloseCon($conn);

}elseif(isset($_POST['submitUpload']) && !empty($_FILES['pdf_file']['name'])){
    $conn = OpenCon();

        //a $_FILES 'error' value of zero means success. Anything else and something wrong with attached file.
       if ($_FILES['pdf_file']['error'] != 0) {
           echo 'Something wrong with the file.';
       } else { //pdf file uploaded okay.
           //project_name supplied from the form field
           $project_name = htmlspecialchars($_POST['project_name']);
   
           //attached pdf file information
           $file_name = $_FILES['pdf_file']['name'];
           $file_tmp = $_FILES['pdf_file']['tmp_name'];
           if ($pdf_blob = fopen($file_tmp, "rb")) {
            $content = fread($pdf_blob, filesize($file_tmp));
            $content = addslashes($content);
   
            $insert_sql = "INSERT INTO documents (idProf, titreDocument, contDocument)
                            VALUES('777', '$project_name', '$content');";

            if ($conn->query($insert_sql) === TRUE) {
                echo "New record created successfully";
                } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
                }

            // $stmt = $pdo->prepare($insert_sql);
            // $stmt->bindParam(':project_name', $project_name);
            // $stmt->bindParam(':pdf_doc', $pdf_blob, PDO::PARAM_LOB);



           } else {
               //fopen() was not successful in opening the .pdf file for reading.
               echo 'Could not open the attached pdf file';
           }
       }
   } elseif ($_POST["submitDownload"]) {
       
    $conn = OpenCon();
    $idDoc = $_POST["idDoc"];

    echo "helloooooo" . $idDoc;
    
    $sql = "SELECT titreDocument, contDocument from documents WHERE idDocument = '$idDoc'";

    $result = $conn -> query($sql);
    
    $row = $result -> fetch_assoc();
    
    $file = $row["titreDocument"];
    $content = $row["contDocument"];


    header('Content-type: application/pdf');
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
    header("Content-Disposition: inline;filename='". $file .".pdf'");
    header("Content-length: ".strlen($content));
    echo $content;
    exit();



    CloseCon($conn);


   }

   
?>
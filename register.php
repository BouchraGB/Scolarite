<?php
include 'db.php';

//login to the site
if($_POST){

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
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT , ['cost' => 10]);

        $sql = "INSERT INTO profile (nom, prenom, email, motdepasse, typeprofile ) VALUES ('$nom', '$prenom', '$email', '$password','$typeprofile')";

        if ($conn->query($sql) === TRUE) {
            //naviger a la page d'accueil
            header("Location: accueilEn.php");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

    CloseCon($conn);

}
?>
<!DOCTYPE html>
<head>

<style>
html,body{
    background-image: url('./static/images/background.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
    font-family: 'Numans', sans-serif;
}
</style>

<title>Scolarite</title>
<!--Importation des fichiers css de Bootstrap-->
<link rel="stylesheet" href="static/css/bootstrap-grid.css">
<link rel="stylesheet" href="static/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="static/css/bootstrap-reboot.css">
<link rel="stylesheet" href="static/css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="static/css/bootstrap.css">
<link rel="stylesheet" href="static/css/bootstrap.min.css">
<link rel="stylesheet" href="static/css/style.css">
<!-- <link rel="stylesheet" href="static/css/all.css"> -->

<!--Importation des fichiers js de Bootstrap-->
<script src="static/js/bootstrap.bundle.js"></script>
<script src="static/js/bootstrap.bundle.min.js"></script>
<script src="static/js/bootstrap.js"></script>
<script src="static/js/bootstrap.min.js"></script>

<!-- Fontawesome CDN -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>


<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign Up</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fas fa-pen"></i></span>
                        <span><i class="fas fa-book"></i></span>
                        <span><i class="fas fa-graduation-cap"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="register.php" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nom" name="nom" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Prenom" name="prenom" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-question"></i></span>
                            </div>
                            <select class="form-control" name="typeprofile" required>
                                <option value="" disabled selected>Selectionner une option</option>
                                <option value="0">Enseignant</option>
                                <option value="1">Etudiant</option>
                            </select>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="confirm password" name = "password2" required>
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn float-right login_btn" name="submitRegiter">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
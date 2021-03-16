<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<style>
html,body{
    background-image: url('./static/images/background.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
    font-family: 'Numans', sans-serif;
}
</style>
<head>

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
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fas fa-pen"></i></span>
                        <span><i class="fas fa-book"></i></span>
                        <span><i class="fas fa-graduation-cap"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="motdepasse">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn" name="submitLogin">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="register.php">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php
include 'db.php';

//login to the site
if($_POST){
    $conn = OpenCon();

    $email = $_POST["email"];
    $password = $_POST['motdepasse'];
    //echo $email;
    //$password = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT , ['cost' => 15]);

    $sql = "SELECT * from profile WHERE email = '$email' ";

    $result = $conn -> query($sql);
 

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){
            $mdp = $row["motdepasse"];
            if(password_verify($password, $mdp)){
                $sql2 = "SELECT idProfile, nom, prenom from profile WHERE email = '$email' ";

                $result2 = $conn -> query($sql2);
        
                $row = $result2->fetch_assoc();
                $nom = $row["nom"];
                $prenom = $row["prenom"];
                $id = $row["idProfile"];
        
                // Set session variables pour garder les info de user
                $_SESSION["id"] = $id;
                $_SESSION["nom"] = $nom;
                $_SESSION["prenom"] = $prenom;
                $_SESSION["email"] = $email;
        
                //naviger a la page d'accueil
                header("Location: accueilEn.php");
            }else{
                echo "mdp non valide !";
            }
    
        }

    }else {
        echo "pas de user".$password;
    }

    CloseCon($conn);

}
?>
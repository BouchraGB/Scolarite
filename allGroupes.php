<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>
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

      <!--Importation des fichiers js de Bootstrap-->
      <script src="static/js/bootstrap.bundle.js"></script>
      <script src="static/js/bootstrap.bundle.min.js"></script>
      <script src="static/js/bootstrap.js"></script>
      <script src="static/js/bootstrap.min.js"></script>


      <!-- Fontawesome CDN -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  </head>
  <body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <!-- Logo -->
      <a class="navbar-brand" href="#">Navbar</a>
    
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar" >
        
        <!--search box-->
        <form class="form-inline collapse navbar-collapse d-flex justify-content-end" action="">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
        </form>

        <!--les icons-->
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item paddingElt" >
            <a class="nav-link waves-effect waves-light">
              <i class="fas fa-bell"></i>
            </a>
          </li>
          <li class="nav-item paddingElt" >
            <a class="nav-link waves-effect waves-light">
              <i class="fas fa-envelope"></i>
            </a>
          </li>
          <li class="nav-item dropdown paddingElt" >
            <a class="nav-link waves-effect waves-light" id="navbarDropdownMenuLink" >
              <i class="fas fa-sign-out-alt"></i>
            </a>
          </li>
        </ul>       
      </div>
    </nav>

    <div class="container ">
      <div class="inline " >
        <img src="static/images/user.png" class="rounded myavatar" alt="user" >

        <div class=" inline align-middle" style="padding-top : 9%; margin-left : 3vw;">
          <h2  class="align-middle"><?php echo "hello " . $_SESSION["nom"] ; ?> </h2>

          <p ><a href=" ">Ajouter une description ...</a></p>

       
        </div>


        

      </div>

      <br> <br>

      <!-- Mes documents  -->
      <h5 class="miniTitle">Tous mes groupes</h5>

      <div class="row d-flex justify-content-begin">

      <?php

      $conn = openCon();
      $id = $_SESSION["id"];
      $sql = "SELECT idGroupe, nomGroupe, codeGroupe, idProf FROM groupes WHERE idProf = '$id'";
      $result = $conn -> query($sql);

      while($row = $result->fetch_assoc()){
        $nom = $row["nomGroupe"];
        $idg = $row["idGroupe"];
        $code = $row["codeGroupe"];
        $idP = $row["idProf"];
        
        ?>
        <form action="groupe.php" method="POST">
        <div class="card" style="width: 10rem; height: 10rem; margin: 2vw;">
                    <div class="card-body " >
                      <div class="longText"><h6 class="card-title"><?php echo $nom; ?></h6></div>
                      <input type="submit" class="btn btn-primary" style="position : absolute; bottom: 2%;" value="Details">
                      <input name="idGrp" value = "<?php echo $idg;  ?>" style="display : none;">
                      <input name="nomGrp" value = "<?php echo $nom;  ?>" style="display : none;">
                      <input name="codeGrp" value = "<?php echo $code;  ?>" style="display : none;">
                      <input name="profGrp" value = "<?php echo $idP;  ?>" style="display : none;">
                    </div>
                    
                </div>
        </form>
        <?php
      }
        ?>

      <div class="card" style="width: 10rem; height: 10rem; margin: 2vw; cursor: pointer;" onclick="location.href='addGroupe.php';" >
            
            <img src="static/images/ajouterDoc.png" alt="..." style="height : 100%; width : 100%;">
            <div class="longText" style="position: absolute; bottom : 2%;"><p class="card-text">Ajouter Groupe</p></div>
               
      </div>

      </div>


      <br>


      </div>


    <!-- Footer -->
    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->



  </body>
</html>

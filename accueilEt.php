<?php
session_start();
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

      <ul class="profile-header-tab nav nav-tabs">
                     <li class="nav-item"><a href="#profile-post" class="nav-link active show" data-toggle="tab">Accueil</a></li>
                     <li class="nav-item"><a href="#profile-about" class="nav-link" data-toggle="tab">Publications Sauvegardees</a></li>
                     <li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab">Mes Groupes</a></li>
                     <li class="nav-item"><a href="#profile-videos" class="nav-link" data-toggle="tab">Connections</a></li>
      </ul>

    </div>


                      <!-- begin #profile-post tab -->
                      <div class="tab-pane fade active show" id="profile-post" style="margin-left : -15vw;">
                     <!-- begin timeline -->
                     <ul class="timeline">
                        <li>
                           <!-- begin timeline-time -->
                           <div class="timeline-time">
                              <span class="date">today</span>
                              <span class="time">04:20</span>
                           </div>
                           <!-- end timeline-time -->
                           <!-- begin timeline-icon -->
                           <div class="timeline-icon">
                              <a href="javascript:;">&nbsp;</a>
                           </div>
                           <!-- end timeline-icon -->
                           <!-- begin timeline-body -->
                           <div class="timeline-body">
                              <div class="timeline-header">
                                 <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""></span>
                                 <span class="username"><a href="javascript:;">Sean Ngu</a> <small></small></span>

                              </div>
                              <div class="timeline-content">
                                 <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc faucibus turpis quis tincidunt luctus.
                                    Nam sagittis dui in nunc consequat, in imperdiet nunc sagittis.
                                 </p>
                              </div>
                           </div>
                           <!-- end timeline-body -->
                        </li>
                        <li>
                           <!-- begin timeline-time -->
                           <div class="timeline-time">
                              <span class="date">yesterday</span>
                              <span class="time">20:17</span>
                           </div>
                           <!-- end timeline-time -->
                           <!-- begin timeline-icon -->
                           <div class="timeline-icon">
                              <a href="javascript:;">&nbsp;</a>
                           </div>
                           <!-- end timeline-icon -->
                           <!-- begin timeline-body -->
                           <div class="timeline-body">
                              <div class="timeline-header">
                                 <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""></span>
                                 <span class="username">Sean Ngu</span>
                                 
                              </div>
                              <div class="timeline-content">
                                 <p>Location: United States</p>
                              </div>
 
                           </div>
                           <!-- end timeline-body -->
                        </li>
                        <li>
                           <!-- begin timeline-time -->
                           <div class="timeline-time">
                              <span class="date">24 February 2014</span>
                              <span class="time">08:17</span>
                           </div>
                           <!-- end timeline-time -->
                           <!-- begin timeline-icon -->
                           <div class="timeline-icon">
                              <a href="javascript:;">&nbsp;</a>
                           </div>
                           <!-- end timeline-icon -->
                           <!-- begin timeline-body -->
                           <div class="timeline-body">
                              <div class="timeline-header">
                                 <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""></span>
                                 <span class="username">Sean Ngu</span>
                                 
                              </div>
                              <div class="timeline-content">
                                 <p class="lead">
                                    <i class="fa fa-quote-left fa-fw pull-left"></i>
                                    Quisque sed varius nisl. Nulla facilisi. Phasellus consequat sapien sit amet nibh molestie placerat. Donec nulla quam, ullamcorper ut velit vitae, lobortis condimentum magna. Suspendisse mollis in sem vel mollis.
                                    <i class="fa fa-quote-right fa-fw pull-right"></i>
                                 </p>
                              </div>
  
                           </div>
                           <!-- end timeline-body -->
                        </li>
                        <li>
                           <!-- begin timeline-time -->
                           <div class="timeline-time">
                              <span class="date">10 January 2014</span>
                              <span class="time">20:43</span>
                           </div>
                           <!-- end timeline-time -->
                           <!-- begin timeline-icon -->
                           <div class="timeline-icon">
                              <a href="javascript:;">&nbsp;</a>
                           </div>
                           <!-- end timeline-icon -->
                           <!-- begin timeline-body -->
                           <div class="timeline-body">
                              <div class="timeline-header">
                                 <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""></span>
                                 <span class="username">Sean Ngu</span>
                                 
                              </div>
                              <div class="timeline-content">
                                 <h4 class="template-title">
                                    <i class="fa fa-map-marker text-danger fa-fw"></i>
                                    795 Folsom Ave, Suite 600 San Francisco, CA 94107
                                 </h4>
                                 <p>In hac habitasse platea dictumst. Pellentesque bibendum id sem nec faucibus. Maecenas molestie, augue vel accumsan rutrum, massa mi rutrum odio, id luctus mauris nibh ut leo.</p>
                                 <p class="m-t-20">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                                 </p>
                              </div>

                           </div>
                           <!-- end timeline-body -->
                        </li>
                        <li>
                           <!-- begin timeline-icon -->
                           <div class="timeline-icon">
                              <a href="javascript:;">&nbsp;</a>
                           </div>
                           <!-- end timeline-icon -->
                           <!-- begin timeline-body -->
                           <div class="timeline-body">
                              Loading...
                           </div>
                           <!-- begin timeline-body -->
                        </li>
                     </ul>
                     <!-- end timeline -->
                  </div>
                  <!-- end #profile-post tab -->


      <footer class="bg-light text-center text-lg-start">


        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2020 Copyright:
          <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
      </footer>



  </body>
</html>

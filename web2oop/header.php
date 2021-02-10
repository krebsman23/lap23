
<?php
session_start();
?>
<!-- Boostrap einbinden -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 <html lang="de">
 <head>
   <!-- Erster Website aufbau Versuch-->
   <title>Website Userverwaltung</title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <!-- MyCss wird inkludiert-->
   <link rel="stylesheet" href="./css/mycss.css" type="text/css" />
 </head>
 <body>
   <div class="navbar">
     <ul>
       <li><a href="./index.php">Home</a></li>
       <?php

       //Wenn User eingeloggt dann Logout
       if(isset($_SESSION['loggedUser']) || isset($_SESSION['loggedTrainer']) || isset($_SESSION['loggedAdmin'])){
         echo "<li><a href='./includes/logout.inc.php'>Logout</a></li>";
                                     if(isset($_SESSION['loggedAdmin'])){
                                       echo "<li><a href='/web2/register.php'>Create User</a></li>";
                                     }
       } else {

       echo "<li><a href='./login.php'>Login</a></li>";


     }
     ?>
     </ul>

  </div>
 </body>
 </html>

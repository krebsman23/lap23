
<?php
require ("./header.php");
?>
<!-- Testform -->
<html>
 <body>
   <div class="container">
     <h1>Home</h1>
     <?php
     if(isset($_SESSION['loggedUser'])){
       require("./includes/userindex.php");
     }else if(isset($_SESSION['loggedTrainer'])){
       require("./includes/internalindex.php");
     }else if(isset($_SESSION['loggedAdmin'])){
       require("./includes/adminindex.php");
     }else {
       echo "<h4>Du bist ausgeloggt!</h4>";
     }
     ?>
   </div>
  </body>
</html>

<?php

//Check if User is Admin 
if(isset($_POST['loggedAdmin'])) {
echo "<h4>Du bist eingeloggt als Admin ".$_SESSION['loggedAdmin']."!</h4>";
}else{
  Header("Location: ..//login.php?error=notloggedasAdmin");
  exit();
}
 ?>

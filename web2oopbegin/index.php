<?php
include './db.inc.php';
include './user.inc.php';
include './viewuser.inc.php';

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
  <?php
  $users = new ViewUser();
  $users->showallUsers();

   ?>
</body>
</html>

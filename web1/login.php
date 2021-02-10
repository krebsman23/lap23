<?php
require("H:/Xampp/htdocs/web1/header.php");
if(isset($_GET['sucess'])){
  if($_GET['sucess'] == 'UserCreated'){
    echo "<p class='sucess-msg'> Der Benutzer wurde erfolgreich angelegt!";
  }
}
if(isset($_GET['error'])){
  if($_GET['error'] == 'fieldsempt'){
    echo "<p class='error-msg'> Bitte füllen Sie alle Felder aus!";
  } else if($_GET['error'] == 'UserNotCreatet'){
    echo "<p class='error-msg'> Benutzername oder Passwort sind falsch!";
  }
}
?>

<h3>Jetzt Einloggen</h3>
<form action="/web1/includes/login.inc.php" class="register-form" method="POST">
  <label>    Username:  </label>
  <input type="text" name="user" placeholder="Username"><br>
  <label> Passwort: </label>
  <input type="password" name="passwort" placeholder="Passwort"><br>
  <input type="submit" name="login-submit" placeholder="Login">
</form>

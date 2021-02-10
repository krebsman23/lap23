<head>
<?php
require("./header.php");

if(isset($_GET['error'])){
  if ($_GET['error'] == 'fieldsempty'){
    echo "<p class='error-msg'>Bitte alle Felder ausfüllen!</p>";
  }else if ($_GET['error'] == 'invalidusername'){
    echo "<p class='error-msg'>Bitte geben Sie einen gültigen Benutzernamen ein!</p>";
  }else if ($_GET['error'] == 'passwordsdontmatch'){
    echo "<p class='error-msg'>Die Passwörter stimmen nicht überein!</p>";
  }else if ($_GET['error'] == 'UserAlreadyTaken'){
    echo "<p class='error-msg'>Benutzername bereits vergeben!</p>";
  }
}
?>


<div class="container">
  <h3>Jetzt registrieren</h3>
  <form action="./includes/register.inc.php" class="register-form" method="POST">
    <label>    Username:  </label>
    <input type="text" name="user" placeholder="Username"><br>
    <label>Email: </label>
    <input type="text" name="email" placeholder="Email"><br>
    <label> Passwort: </label>
    <input type="password" name="passwort" placeholder="Passwort"><br>
    <label>Passwort wiederholen: </label>
    <input type="password" name="passwort_confirm" placeholder="Passwort wiederholen"><br>
    <label>Ort: </label>
    <input type="text" name="place" placeholder="Ort"><br>
    <label>PLZ: </label>
    <input type="text" name="postal_code" placeholder="PLZ"><br>
    <label>Straße/Hausnummer: </label>
    <input type="text" name="street" placeholder="Straße + Hausnummer"><br>
    <label for="cars">Kurs:</label>
    <select name="course" id="course">
      <option>-- Kurs auswählen --</option>
      <option value="deutsch">Deutsch</option>
      <option value="mathe">Mathe</option>
      <option value="english">Englisch</option>
    </select><br>
    <input type="submit" name="register-submit">
  </form>
</div>

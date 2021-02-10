<?php
//Nur wenn der Knopf absende gedrückt wurde wird der Inhalt aufgerufen
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['login-submit'])) {



  require ("../dbconfig.php");
  //Daten des Formulars werden in Variablen gespeichert
  $username = $_POST['user'];
  $password = $_POST['passwort'];

  //Wenn eines der Formularfelder leer ist wird der User auf die Registrieren
  //zurückgeleitet.
  if(empty($username) || empty($password)) {
      Header("Location: ..//login.php?error=fieldsempty&username=".$username."&password=".$password);
      exit();
    } else {
      //Überprüfe ob Nutzer existiert
      $sql = "SELECT * FROM users WHERE user = ? AND password = ?";
      $statement= $db->prepare($sql);
      $statement->bind_param('ss', $username, $password);
      $statement->execute();
      $result = $statement->get_result();
      $count = $result->num_rows;
      while($row = $result->fetch_object()) {
          $set_user_role = $row->user_role;
        }
      $statement->close();
      //Wenn eine Row existiert dann wird eine Session gestartet
      if($count > 0){
        session_start();
          Header("Location: ../index.php?sucess=login");
        if($set_user_role == 0) {
          $_SESSION['loggedUser'] = $username;
        } else if ($set_user_role == 1){
          $_SESSION['loggedTrainer'] = $username;
        } else {
          $_SESSION['loggedAdmin'] = $username;
        }
        exit();
      } else {
          Header("Location: ../index.php?error=UserNotCreatet");
      }
    }

 } else {
    Header("Location: ../register.php");
}

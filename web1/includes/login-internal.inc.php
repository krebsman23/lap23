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
      $sql = "SELECT * FROM internal_users WHERE internal_user = ? AND internal_password = ?";
      $statement= $db->prepare($sql);
      $statement->bind_param('ss', $username, $password);
      $statement->execute();
      $result = $statement->get_result();
      $count = $result->num_rows;
      $statement->close();

      //Wenn eine Row existiert dann wird eine Session gestartet
      if($count > 0){
        session_start();
          Header("Location: ..//index.php?sucess=login");
          $_SESSION['internal_loggedUser'] = $username;
          exit();
      } else{
          Header("Location: ..//login.php?error=UserNotCreatet");
      }

    }

 } else {
    Header("Location: ../register.php");
}

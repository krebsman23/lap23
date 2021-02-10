<?php
//Nur wenn der Knopf absende gedrückt wurde wird der Inhalt aufgerufen
if(isset($_POST['absenden'])) {
  require ("../dbconfig.php");

  //Daten des Formulars werden in Variablen gespeichert
  $username = $_POST['user'];
  $password = $_POST['passwort'];
  $password_confirm = $_POST['passwort_confirm'];


  //Wenn eines der Formularfelder leer ist wird der User auf die Registrieren
  //zurückgeleitet.
  if( empty($username) || empty($password) || empty($password_confirm)){
      Header("Location: ..//register.php?error=fieldsempty&username=".$username."&password=".$password."&password_confirm=".$password_confirm);

      exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
      Header("Location: ..//register.php?error=invalidusername");
      exit();
    }
    else if ($password !== $password_confirm){
      Header("Location: ..//register.php?error=passwordsdontmatch&username=".$username);
      exit();
    } else {
      //Abfrage ob der User schon existiert
      $sql = "SELECT username FROM users WHERE username = ?";
      $stmt = mysqli_stmt_init($db);
      if(!myslqi_prepare($stmt, $sql)){
        Header("Location: ..//register.php?sqlerror");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute();
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
          Header("Location: ..//register.php?error=user_already_taken");
          exit();}
        } else {
           // $sql = "INSERT INTO users (user, password) VALUES '?','?' "
           // $stmt = $db->prepare($sql);
           // $stmt->bind_param('ss', $username, $password);
           // $stmt->execute();

           echo "Datenbankeintragung wird gestartet";

        }
      }

    }

  } else {
    Header("Location: ../register.php");
}

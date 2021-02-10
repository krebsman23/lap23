<?php
//Nur wenn der Knopf absende gedrückt wurde wird der Inhalt aufgerufen
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_POST['register-submit'])) {
  require ("../dbconfig.php");

  //Daten des Formulars werden in Variablen gespeichert
  $username = $_POST['user'];
  $email = $_POST['email'];
  $password = $_POST['passwort'];
  $password_confirm = $_POST['passwort_confirm'];
  $postal_code = $_POST['postal_code'];
  $street = $_POST['street'];
  $place = $_POST['place'];
  $course_name = $_POST['course'];
  $user_role = $_POST['user_role'];


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

      //Überprüfen ob User schon vorhanden ist
      $sql_u = "SELECT * FROM users WHERE user = ?";
      $res_u = $db->prepare($sql_u);
      $res_u->bind_param("s", $username);
      $res_u->execute();
      $result = $res_u->get_result();
      $count = $result->num_rows;
      print "Number of rows: ".$count;
      $res_u->close();

      if($count > 0){
        Header("Location: ../register.php?error=UserAlreadyTaken");

      } else {


        //course ID abfragen von dropdown
        $sql = "SELECT * FROM course WHERE course = ?";
        $statement = $db->prepare($sql);
        $statement->bind_param('s', $course_name);
        $statement->execute();
        $result = $statement->get_result();

        //course ID von User an Variable
        while($row = $result->fetch_object()) {
            $register_course_id = $row->course_id;
        }


        //User wird in die Datenbank eingetragen
      $sql = "INSERT INTO users (user, password,  email, postal_code, street, place, course_id, user_role) VALUES (?,?,?,?,?,?,?,?)";
      $statement = $db->prepare($sql);
      $statement->bind_param("sssssssi", $username, $password, $email, $postal_code, $street, $place, $register_course_id, $user_role);
      $statement->execute();
      $statement->close();



      Header("Location: ../index.php?sucess=UserCreated");
      }



    //Dateien aus Datenbank lesen
      $id = 100;
      $sql = "SELECT * FROM users WHERE id < ?";
      $statement = $db->prepare($sql);
      $statement->bind_param('i', $id);
      $statement->execute();
      $result = $statement->get_result();

      while($row = $result->fetch_object()) {
        echo "<br>";
        echo $row->user;

      }


    }

 } else {
    Header("Location: ../register.php");
}

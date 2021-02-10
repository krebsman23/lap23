
<?php
if(isset($_POST['loggedUser'])) {
     echo "<h4>Du bist eingeloggt als User ".$_SESSION['loggedUser']."!</h4>";

     //Ausgabe für welchen Kurs der User registriert ist
     require ("H:/Xampp/htdocs/web1/dbconfig.php");
     $db_user = $_SESSION['loggedUser'];
     $sql = "SELECT * FROM users INNER JOIN course ON users.course_id = course.course_id WHERE user = ?  ";
     $statement= $db->prepare($sql);
     $statement->bind_param('s', $db_user);
     $statement->execute();
     $result = $statement->get_result();
     while($row = $result->fetch_object()) {
         echo '<p> Du bist für den '.$row->course.' Kurs registriert</p>';
         $set_course = $row->course;
       }


     //Ausgabe der Tabelle für Kursmaterialien
     $sql = "SELECT DISTINCT * FROM course INNER JOIN documents ON course.course_id = documents.course_id WHERE course = ?";
     $statement = $db->prepare($sql);
     $statement->bind_param('s', $set_course);
     $statement->execute();
     $result = $statement->get_result();
     echo "<br><h3>Kursübersicht</h3>";
     echo '<table class="table">';
       echo '<tr>';
         echo '<th>Name</th>';
         echo '<th>Download</th>';
       echo '</tr>';
     while($row = $result->fetch_object()) {
       echo '<tr>';
         echo '<td>'.$row->name.'</td>';
         echo '<td><a target="_blank" href="'.$row->path.'">Download</a></td>';
       echo '</tr>';
     }
     echo '</table>';

  } else {
     Header("Location: H:/Xampp/htdocs/web1/login.php?error=notloggedasUser");
     echo "in Index set as logged User";
     exit();
   }
   ?>

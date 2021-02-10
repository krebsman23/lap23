<?php

//Check if User is Trainer
if(isset($_POST['loggedTrainer'])) {
  echo "<h4>Du bist eingeloggt als Trainer
   ".$_SESSION['loggedTrainer']."!</h4>";
  require ("./dbconfig.php");

  //Ausgabe der User Tabelle
  $sql = "SELECT * FROM users INNER JOIN course ON users.course_id = course.course_id";
  $statement = $db->prepare($sql);
  $statement->execute();
  $result = $statement->get_result();

  echo "<br><h3>Userübersicht</h3>";
  echo '<table class="table">';
    echo '<tr>';
      echo '<th>Username</th>';
      echo '<th>Passwort</th>';
      echo '<th>Email</th>';
      echo '<th>PLZ</th>';
      echo '<th>Straße</th>';
      echo '<th>Ort</th>';
      echo '<th>Kurs</th>';
    echo '</tr>';
  while($row = $result->fetch_object()) {
    echo '<tr>';
      echo '<td>'.$row->user.'</td>';
      echo '<td>'.$row->password.'</td>';
      echo '<td>'.$row->email.'</td>';
      echo '<td>'.$row->postal_code.'</td>';
      echo '<td>'.$row->street.'</td>';
      echo '<td>'.$row->place.'</td>';
      echo '<td>'.$row->course.'</td>';
    echo '</tr>';
  }
  echo '</table>';

} else {
  Header("Location: ..//login.php?error=notloggedasTrainer");
  exit();
}
?>

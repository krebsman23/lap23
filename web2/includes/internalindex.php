<?php

//Check if User is Trainer
if(isset($_SESSION['loggedTrainer'])) {
  echo "<h4>Du bist eingeloggt als Trainer ".$_SESSION['loggedTrainer']."!</h4>";
  require ("./dbconfig.php");

  $db_user = $_SESSION['loggedTrainer'];
  $sql = "SELECT * FROM users INNER JOIN course ON users.course_id = course.course_id WHERE user = ?  ";
  $statement= $db->prepare($sql);
  $statement->bind_param('s', $db_user);
  $statement->execute();
  $result = $statement->get_result();
  while($row = $result->fetch_object()) {
      echo '<p> Du bist Trainer für den '.$row->course.' Kurs</p>';
      $set_course_id = $row->course_id;
    }

  //Ausgabe der Teilnehmer Tabelle
  $sql = "SELECT * FROM users INNER JOIN course ON users.course_id = course.course_id WHERE course.course_id = ? AND users.user_role = 0";
  $statement = $db->prepare($sql);
  $statement->bind_param('s', $set_course_id);
  $statement->execute();
  $result = $statement->get_result();

  echo "<br><h3>Teilnehmerübersicht</h3>";
  echo '<table class="table">';
    echo '<tr>';
      echo '<th>Username</th>';
      echo '<th>Email</th>';
      echo '<th>PLZ</th>';
      echo '<th>Straße</th>';
      echo '<th>Ort</th>';
      echo '<th>Kurs</th>';
    echo '</tr>';
  while($row = $result->fetch_object()) {
    echo '<tr>';
      echo '<td>'.$row->user.'</td>';
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

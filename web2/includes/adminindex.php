<?php

//Check if User is Admin
if(isset($_SESSION['loggedAdmin'])) {
  require ("./dbconfig.php");
  echo "<h4>Du bist eingeloggt als Admin ".$_SESSION['loggedAdmin']."!</h4>";

  //Ausgabe der Teilnehmer Tabelle
  $sql = "SELECT * FROM users
    LEFT JOIN course ON users.course_id = course.course_id ";
  $statement = $db->prepare($sql);
  $statement->execute();
  $result = $statement->get_result();

  echo "<br><h3>Userübersicht</h3>";
  echo '<table class="table">';
    echo '<tr>';
      echo '<th>Username</th>';
      echo '<th>Email</th>';
      echo '<th>PLZ</th>';
      echo '<th>Straße</th>';
      echo '<th>Ort</th>';
      echo '<th>Kurs</th>';
      echo '<th>Rolle</th>';
    echo '</tr>';
  while($row = $result->fetch_object()) {
    echo '<tr>';
      echo '<td>'.$row->user.'</td>';
      echo '<td>'.$row->email.'</td>';
      echo '<td>'.$row->postal_code.'</td>';
      echo '<td>'.$row->street.'</td>';
      echo '<td>'.$row->place.'</td>';
      echo '<td>'.$row->course.'</td>';
      if($row->user_role  == 0){
          echo '<td>User</td>';
      } else if($row->user_role  == 1){
          echo '<td>Trainer</td>';
        } else{
          echo "<td>Administrator</td>";
        }

    echo '</tr>';
  }
  echo '</table>';


}else{
  Header("Location: ..//login.php?error=notloggedasAdmin");
  exit();
}
 ?>

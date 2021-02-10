<?php class User extends Dbcon{

  protected function getallUsers() {
    $sql = "SELECT * FROM users";
    $result = $this->connect()->query($sql);
    $numrows = $result->num_rows;
    if($numrows > 0 ){
      while($row = $result->fetch_assoc()){
        $data[]=$row;
      }
      return $data;
    }

  }
} ?>

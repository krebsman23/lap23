<?php class ViewUser extends User{
  private $servername;
  private $dbusername;
  private $dbpwd;
  private $dbname;

  public function showallUsers() {
    $datas = $this->getallUsers();
    foreach ($datas as $data){
      echo $data['user'];
    }


  }
}

?>

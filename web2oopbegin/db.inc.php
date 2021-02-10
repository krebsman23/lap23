<?php class Dbcon{
  private $servername;
  private $dbusername;
  private $dbpwd;
  private $dbname;

  protected function connect() {
    $this->servername ="localhost";
    $this->dbusername ="root";
    $this->dbpwd ="";
    $this->dbname ="web2";

    $db = new mysqli($this->servername,$this->dbusername,$this->dbpwd,$this->dbname);
    return $db;
  }
} ?>

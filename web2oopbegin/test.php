
<?php
//Class wird erstellt
class User{
  //Variablen werden definert
  private $user = "jonas";
  private $email = "jonas@gmail.com";

  //Variablen werden von den jeweiligen Instances definiert
  public function __construct($user, $email){
    $this->user = $user;
    $this->email = $email;

  }

  public function addFriend(){
    return "$this->user added a new friend";
  }

//getter
  public function getEmail(){
    return "$this->email <br>";
  }

  //setter
  public function set Email(){
    $this->email = $email;
  }
}

$userOne = new User('fuad','fuad@google.com');
$userTwo = new User('harvey','harvey@google.com');
//Definierter Wert in der Klasse wird ausgegeben
echo $userOne->getEmail();

//Überprüfung welche Klasse
echo "Diese Klasse ist<br> ". get_class($userOne);

print_r(get_class_vars('User'));
print_r(get_class_methods('User'));

?>
<!-- Testform -->
<html>
 <body>
   <div class="container">
     <h1>OOP Test</h1>

   </div>
  </body>
</html>
 

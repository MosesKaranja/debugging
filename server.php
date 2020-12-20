<?php
class server{
  public $con;

  public function __construct(){
    $this->con = (is_null($this->con)) ? self::connect() : $this->con;
  }

  static function connect(){
    $con = mysqli_connect('localhost','root','');
    $db = mysqli_select_db('soap', $con);
    return $con;

  }

  public function getStudentName($id_array){
    $id = $id_array['id'];
    $sql = "SELECT name FROM students WHERE id = '$id'";
    $qry = mysqli_query($sql, $this->con);
    $res = mysqli_fetch_array($qry);
    return $res['name'];

    //return "Called a Soap Method";
  }

}

$params = array('uri' => 'http://localhost/codevMose/server.php');
$server = new SoapServer(NULL, $params);
$server->setClass('server');
$server->handle();

?>

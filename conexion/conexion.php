<?php 
class Conexion{    
    /*private $dsn='mysql:host=sql437.main-hosting.eu;port=3306;dbname=u991668360_deliciaexpress';
    private $usr='u991668360_daniela';
    private $psw='Daniela322';  
    private $cnx;*/
    private $dsn='mysql:host=localhost;dbname=deliciaexpress';
    private $usr='root';
    private $psw='';  
    private $cnx;
public function __construct(){
    try {
        $this->cnx=new PDO($this->dsn,$this->usr,$this->psw);
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
public function desconectar(){
    $this->cnx=null;
}
public function getCnx(){
    return $this->cnx;
}
public function setCnx($cnx){
    $this->cnx=$cnx;
}
}
?>
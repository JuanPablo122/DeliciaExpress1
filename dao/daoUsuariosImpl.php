<?php
include('daoUsuarios.php');
include ('../conexion/conexion.php');
include ('../modelo/usuarios.php');
include ('../modelo/restaurantes.php');

class DaoUsuariosImpl extends Conexion implements daoUsuarios{
   
    
    public function registrar(Usuarios $a){ 
        try{
        if ($this->getCnx()!=null) {
        $IdUsuarios=$a->getIdUsuarios();
        $NombreUsuarios=$a->getNombreUsuarios();
        $ApellidoUsuarios=$a->getApellidoUsuarios();
        $EmailUsuarios=$a->getEmailUsuarios();
        $ContrasenaUsuarios=$a->getContrasenaUsuarios();
        $IdRoles=$a->getIdRoles();
        $IdTipos=$a->getIdTipos();
        $Eps=$a->getEps();
        $sql="INSERT INTO usuarios VALUES(?,?,?,?,?,?,?,?)";
        $stmt=$this->getCnx()->prepare($sql);
        $stmt->execute([$IdUsuarios,$NombreUsuarios,$ApellidoUsuarios,$EmailUsuarios,$ContrasenaUsuarios,$IdRoles,$IdTipos,$Eps]);        
        } else {
            echo $this->getCnx().' Es nulo <br>';
        }
    }catch(PDOException $p){
        echo $p->getMessage().'Datos no registrados';
    }
               
        
    }    
    ////funcion modificar
public function modificar(Usuarios $a){  
    $IdUsuarios=$a->getIdUsuarios();      
    $NombreUsuarios=$a->getNombreUsuarios();
    $ApellidoUsuarios=$a->getApellidoUsuarios();
    $EmailUsuarios=$a->getEmailUsuarios();
    $ContrasenaUsuarios=$a->getContrasenaUsuarios();
    $IdRoles=$a->getIdRoles();
    $IdTipos=$a->getIdTipos();
    $Eps=$a->getEps();
    $sql="UPDATE usuarios
    SET NombreUsuarios ='$NombreUsuarios', ApellidoUsuarios ='$ApellidoUsuarios', EmailUsuarios = '$EmailUsuarios', ContrasenaUsuarios = '$ContrasenaUsuarios', IdRoles = '$IdRoles', IdTipos = '$IdTipos', Eps = '$Eps'
    WHERE IdUsuarios ='$IdUsuarios'";
    $stmt=$this->getCnx()->prepare($sql);
    $stmt->execute();
}

    public function eliminar($a){        
        $id=$_GET['IdUsuarios'];
        $stmt=$this->getCnx()->prepare("DELETE FROM usuarios where IdUsuarios=$id");
        $stmt->execute(); 

    }
//public function listar();
public function listar(){
    $lista = null;
    try{    
        $stmt = $this->getCnx()->prepare("SELECT * FROM usuarios");
        $lista = array();
        $stmt->execute();
        foreach ($stmt as $key ) { 
            $a = new Usuarios(null,null,null,null,null,null,null,null);
            $a->setIdUsuarios($key['IdUsuarios']);
            $a->setNombreUsuarios($key['NombreUsuarios']);
            $a->setApellidoUsuarios($key['ApellidoUsuarios']);
            $a->setEmailUsuarios($key['EmailUsuarios']);
            $a->setContrasenaUsuarios($key['ContrasenaUsuarios']);
            $a->setIdRoles($key['IdRoles']);
            $a->setIdTipos($key['IdTipos']); 
            $a->setEps($key['Eps']);              
            array_push($lista,$a);            
        }        
        //$this->getCnx()->close();
    }catch(PDOException $e){
        $e->getMessage().'error en listar de DaoUsuariosImpl';
    } 


        return $lista;       
    }       
    //public function buscar($campo,$dato);
}  

//RESTAURANTES
class DaoRestaurantesImpl extends Conexion implements daoRestaurantes{
   
    
    public function registrar1(Restaurantes $a1){ 
        try{
        if ($this->getCnx()!=null) {
        $IdRestaurantes=$a1->getIdRestaurantes();
        $NombresDue=$a1->getNombresDue();
        $Email=$a1->getEmail();
        $NumeroDue=$a1->getNumeroDue();
        $Contrasena=$a1->getContrasena();
        $TipoPersona=$a1->getTipoPersona();
        $NIT=$a1->getNIT();
        $NomRes=$a1->getNomRes();
        $CelularRes=$a1->getCelularRes();
        $Barrio=$a1->getBarrio();
        $IdRoles=$a1->getIdRoles();
        $sql="INSERT INTO restaurantes VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt=$this->getCnx()->prepare($sql);
        $stmt->execute([$IdRestaurantes,$NombresDue,$Email,$NumeroDue,$Contrasena,$TipoPersona,$NIT,$NomRes,$CelularRes,$Barrio,$IdRoles]);        
        } else {
            echo $this->getCnx().' Es nulo <br>';
        }
    }catch(PDOException $p){
        echo $p->getMessage().'Datos no registrados';
    }
               
        
    }    
    ////funcion modificar
public function modificar1(Restaurantes $a1){  
    $IdRestaurantes=$a1->getIdRestaurantes();      
    $NombresDue=$a1->getNombresDue();
    $Email=$a1->getEmail();
    $NumeroDue=$a1->getNumeroDue();
    $Contrasena=$a1->getContrasena();
    $TipoPersona=$a1->getTipoPersona();
    $NIT=$a1->getNIT();
    $NomRes=$a1->getNomRes();
    $CelularRes=$a1->getCelularRes();
    $Barrio=$a1->getBarrio();
    $IdRoles=$a1->getIdRoles();
    $sql="UPDATE restaurantes
    SET NombresDue ='$NombresDue', Email ='$Email', NumeroDue = '$NumeroDue', Contrasena = '$Contrasena', TipoPersona = '$TipoPersona', NIT = '$NIT', NomRes = '$NomRes', CelularRes = '$CelularRes', Barrio = '$Barrio' ,IdRoles='$IdRoles'
    WHERE IdRestaurantes ='$IdRestaurantes'";
    $stmt=$this->getCnx()->prepare($sql);
    $stmt->execute();
}

    public function eliminar1($a1){        
        $id=$_GET['IdRestaurantes'];
        $stmt=$this->getCnx()->prepare("DELETE FROM restaurantes where IdRestaurantes=$id");
        $stmt->execute(); 

    }
//public function listar();
public function listar1(){
    $lista = null;
    try{    
        $stmt = $this->getCnx()->prepare("SELECT * FROM restaurantes");
        $lista = array();
        $stmt->execute();
        foreach ($stmt as $key ) { 
            $a1 = new Restaurantes(null,null,null,null,null,null,null,null,null,null,null);
            $a1->setIdRestaurantes($key['IdRestaurantes']);
            $a1->setNombresDue($key['NombresDue']);
            $a1->setEmail($key['Email']);
            $a1->setNumeroDue($key['NumeroDue']);
            $a1->setContrasena($key['Contrasena']);
            $a1->setTipoPersona($key['TipoPersona']);
            $a1->setNIT($key['NIT']); 
            $a1->setNomRes($key['NomRes']); 
            $a1->setCelularRes($key['CelularRes']); 
            $a1->setBarrio($key['Barrio']);   
            $a1->setIdRoles($key['IdRoles']);       
            array_push($lista,$a1);            
        }        
        //$this->getCnx()->close();
    }catch(PDOException $e){
        $e->getMessage().'error en listar de DaoRestaurantesImpl';
    } 


        return $lista;       
    }       
    //public function buscar($campo,$dato);
}  

?>
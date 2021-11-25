<?php
class Usuarios{
private $IdUsuarios;
private $NombreUsuarios;
private $ApellidoUsuarios;
private $EmailUsuarios;
private $ContrasenaUsuarios;
private $IdRoles;
private $IdTipos;
private $Eps;

function __construct($IdUsuarios,$NombreUsuarios,$ApellidoUsuarios,$EmailUsuarios,$ContrasenaUsuarios,$IdRoles,$IdTipos,$Eps){
    $this->IdUsuarios=$IdUsuarios;
    $this->NombreUsuarios=$NombreUsuarios;
    $this->ApellidoUsuarios=$ApellidoUsuarios;
    $this->EmailUsuarios=$EmailUsuarios; 
    $this->ContrasenaUsuarios=$ContrasenaUsuarios;
    $this->IdRoles=$IdRoles; 
    $this->IdTipos=$IdTipos;
    $this->Eps=$Eps;
}

function getIdUsuarios() {
    return $this->IdUsuarios;
}

function setIdUsuarios($IdUsuarios) {
    $this->IdUsuarios = $IdUsuarios;
}

function getNombreUsuarios() {
    return $this->NombreUsuarios;
}

function setNombreUsuarios($NombreUsuarios) {
    $this->NombreUsuarios = $NombreUsuarios;
}

function getApellidoUsuarios() {
    return $this->ApellidoUsuarios;
}

function setApellidoUsuarios($ApellidoUsuarios) {
    $this->ApellidoUsuarios = $ApellidoUsuarios;
}

function  getEmailUsuarios() {
    return $this->EmailUsuarios;
}

function  setEmailUsuarios($EmailUsuarios){
    $this->EmailUsuarios= $EmailUsuarios;
}

function  getContrasenaUsuarios() {
    return $this->ContrasenaUsuarios;
}

function  setContrasenaUsuarios($ContrasenaUsuarios){
    $this->ContrasenaUsuarios= $ContrasenaUsuarios;
}

function  getIdRoles() {
    return $this->IdRoles;
}

function  setIdRoles($IdRoles){
    $this->IdRoles= $IdRoles;
}
function setIdTipos($IdTipos){
    $this->IdTipos= $IdTipos;
}
function getIdTipos(){
    return $this->IdTipos;
}
function setEps($Eps){
    $this->Eps= $Eps;
}
function getEps(){
    return $this->Eps;
}
}


?>
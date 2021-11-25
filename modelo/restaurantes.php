<?php
class Restaurantes{
private $IdRestaurantes;
private $NombresDue;
private $Email;
private $NumeroDue;
private $Contrasena;
private $TipoPersona;
private $NIT;
private $NomRes;
private $CelularRes;
private $Barrio;
private $IdRoles;

function __construct($IdRestaurantes,$NombresDue,$Email,$NumeroDue,$Contrasena,$TipoPersona,$NIT,$NomRes,$CelularRes,$Barrio,$IdRoles){
    $this->IdRestaurantes=$IdRestaurantes;
    $this->NombresDue=$NombresDue;
    $this->Email=$Email;
    $this->NumeroDue=$NumeroDue; 
    $this->Contrasena=$Contrasena;
    $this->TipoPersona=$TipoPersona; 
    $this->NIT=$NIT;
    $this->NomRes=$NomRes;
    $this->CelularRes=$CelularRes;
    $this->Barrio=$Barrio;
    $this->IdRoles=$IdRoles;

}

function getIdRestaurantes() {
    return $this->IdRestaurantes;
}

function setIdRestaurantes($IdRestaurantes) {
    $this->IdRestaurantes = $IdRestaurantes;
}

function getNombresDue() {
    return $this->NombresDue;
}

function setNombresDue($NombresDue) {
    $this->NombresDue = $NombresDue;
}

function getEmail() {
    return $this->Email;
}

function setEmail($Email) {
    $this->Email = $Email;
}

function  getNumeroDue() {
    return $this->NumeroDue;
}

function  setNumeroDue($NumeroDue){
    $this->NumeroDue= $NumeroDue;
}

function  getContrasena() {
    return $this->Contrasena;
}

function  setContrasena($Contrasena){
    $this->Contrasena= $Contrasena;
}

function  getTipoPersona() {
    return $this->TipoPersona;
}

function  setTipoPersona($TipoPersona){
    $this->TipoPersona= $TipoPersona;
}
function setNIT($NIT){
    $this->NIT= $NIT;
}
function getNIT(){
    return $this->NIT;
}
function setNomRes($NomRes){
    $this->NomRes= $NomRes;
}
function getNomRes(){
    return $this->NomRes;
}
function setCelularRes($CelularRes){
    $this->CelularRes= $CelularRes;
}
function getCelularRes(){
    return $this->CelularRes;
}
function setBarrio($Barrio){
    $this->Barrio= $Barrio;
}
function getBarrio(){
    return $this->Barrio;
}
function setIdRoles($IdRoles){
    $this->IdRoles= $IdRoles;
}
function getIdRoles(){
    return $this->IdRoles;
}
}


?>
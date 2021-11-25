<?php 
interface daoUsuarios{
    public function registrar(Usuarios $a);
    public function modificar(Usuarios $a);
    public function eliminar(Usuarios $a);
    //public function buscar($campo,$dato);
    public function listar();
}
interface daoRestaurantes{
    public function registrar1(Restaurantes $a1);
    public function modificar1(Restaurantes $a1);
    public function eliminar1(Restaurantes $a1);
    //public function buscar($campo,$dato);
    public function listar1();
}
?>  
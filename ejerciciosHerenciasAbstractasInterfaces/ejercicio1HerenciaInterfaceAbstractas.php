<?php
abstract class Componente{
    public $precio;
    public $nombre;

    public function __construct($precio, $nombre){
        $this->precio=$precio;
        $this->nombre=$nombre;
    }

    public function setPrecio($precio){
        $this->precio=$precio;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public abstract function encender(){

    }
}

class Periferico extends Componente{
    public $tipoSalida;

    public function __construct($precio, $nombre, $tipoSalida){
        parent::--construct($precio, $nombre);
        $this->tipoSalida=$tipoSalida;
    }


    public function setTipoSalida($tipoSalida){
        $this->tipoSalida=$tipoSalida;
    }

    public function getTipoSalida(){
        return $this->tipoSalida;
    }
}

class Ordenador extends Componente{
    public $procesador;
    public $memoriaRam;
    public $grafica;

    public static $numeroCreados=0;

    public function __construct($precio, $nombre,$procesador,$memoriaRam,$grafica){
        parent::__construct($precio,$nombre);
        $this->procesador=$procesador;
        $this->memoriaRam=$memoriaRam;
        $this->grafica=$grafica;
        Componente::subeNumeroCreados();
    }

    public function setProcesador($procesador){
        $this->procesador=$procesador;
    }

    public function setMemoriaRam($memoriaRam){
        $this->memoriaRam=$memoriaRam;
    }

    public function setGrafica($grafica){
        $this->grafica=$grafica;
    }

    public function getProcesador(){
        return $this->procesador;
    }

    public function getMemoriaRam(){
        return $this->memoriaRam;
    }

    public function getGrafica(){
        return $this->grafica;
    }

    public static subeNumeroCreados(){
        $this->numeroCreados+=1;
    }
}

class Monitor extends Periferico{
    public $pixeles;

    public function __construct($precio, $nombre, $tipoSalida, $pixeles){
        parent::__construct($precio, $nombre, $tipoSalida);
        $this->pixeles=$pixeles;
    }

    public function setPixeles($pixeles){
        $this->pixeles=$pixeles;
    }

    public function getPixeles(){
        return $this->pixeles;
    }

}

?>
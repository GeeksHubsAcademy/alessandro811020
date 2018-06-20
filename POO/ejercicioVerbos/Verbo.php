<?php
namespace ejercicioVerbos;
class Verbo{

    private $presente='';
    private $pasado='';
    private $pasadoPerfecto='';
    private $traduccion='';

    //constructor
    public function __constructor($presente,$pasado,$pasadoPerfecto,$traduccion){
        $this->presente=$presente;
        $this->pasado=$pasado;
        $this->pasadoPerfecto=$pasadoPerfecto;
        $this->traduccion=$traduccion;
    }

    //getters
    public function getPresente(){
        return $this->presente;
    }

    public function getPasado(){
        return $this->pasado;
    }

    public function getPasadoPerfecto(){
        return $this->pasadoPerfecto;
    }

    public function getTraduccion(){
        return $this->traduccion;
    }

    //setters
    public function setPresente($presente){
        $this->presente=$presente;
    }

    public function setPasado($pasado){
        $this->pasado=$pasado;
    }

    public function setPasadoPerfecto($pasadoPerfecto){
        $this->pasadoPerfecto=$pasadoPerfecto;
    }

    public function setTraduccion($traduccion){
        $this->traduccion=$traduccion;
    }

    public function toString(){
        return "<table border='1'><tr><th>Presente</th><th>Pasado</th><th>Pasado Perfecto</th><th>Trduccion</th></tr><tr><td>".$this->presente."</td><td>".$this->pasado."</td><td>".$this->pasadoPerfecto."</td><td>".$this->traduccion."</td></tr></table>";
    }

    public function esta($formaVerbal){
        $contieneVerbo = false;
        if ($this->presente === $formaVerbal) {
            $contieneVerbo = true;
        }
        if ($this->pasado === $formaVerbal) {
            $contieneVerbo = true;
        }
        if ($this->pasadoPerfecto === $formaVerbal) {
            $contieneVerbo = true;
        }
        if ($this->traduccion === $formaVerbal) {
            $contieneVerbo = true;
        }
        return $contieneVerbo;
    }
}


?>
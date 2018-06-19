<?php

class Hora{
    //propiedades de hora
    private $hora;
    private $minutos;
    private $segundos;

    //contructor
    public function __constructor($hora, $minutos, $segundos){
        $this->hora=$hora;
        $this->minutos=$minutos;
        $this->segundos=$segundos;
    }

    //getter y setter
    public function getHora(){
        return $this->hora;
    }

    public function getMinutos(){
        return $this->minutos;
    }

    public function getSegundos(){
        return $this->segundos;
    }

    public function setHora($hora){
        $this->hora=$hora;
    }

    public function setMinutos($minutos){
        $this->minutos=$minutos;
    }

    public function setSegundos($segundos){
        $this->segundos=$segundos;
    }

    public function __toString(){
        return "tiempo:".$this->hora." horas :".$this->minutos." minutos :".$this->segundos." segundos";
    }

    public function mostrarHora(){
        return "{$hora}:{$minutos}:{$segundos}":
    }

    public function controladorTiempo(){

        do {
            $this->segundos+=1;
            if ($this->segundos==60) {
                $this->minutos+=1;
                $this->segundos=0;
                if ($this->minutos==60) {
                    $this->hora+=1;
                    $this->minutos=0
                    if ($this->hora==13) {
                        $this->hora=1;
                    }
                }
            }
        } while ($this->segundos<=60);

    }
}


?>
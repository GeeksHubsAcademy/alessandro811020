<?php

class Persona {

//propiedades
private $nombre;
private $apellido;
private $edad;
private $saldo;

//funciones
//constructor: funcion especial que es llamada cuando
//se hace un new Persona(...)
public function __construct($nombre, $apellido, $edad, $saldo) {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->edad = $edad;
    $this->saldo = $saldo;
}

public function muestra() {
    return "nombre: " . $this->nombre . " apellido: " . $this->apellido .
            "edad: " . $this->edad . " saldo: " . $this->saldo;
}

public function ingresa($saldoParaMeter) {
    $this->saldo = $this->saldo + $saldoParaMeter;
}

public function retira($saldoParaRetirar) {
    if ($saldoParaRetirar > $this->saldo) {
        echo "no se puede retirar por que no tienes saldo";
    } else {
        $this->saldo = $this->saldo - $saldoParaRetirar;
    }
}

public function getNombre() {
    return $this->nombre;
}

public function setNombre($nombrePersona) {
    if (strlen($nombrePersona) > 10) {
        echo "error nombre mayor de 10";
    } else {
        $this->nombre = $nombrePersona;
    }
}

function getApellido() {
    return $this->apellido;
}

function getEdad() {
    return $this->edad;
}

function getSaldo() {
    return $this->saldo;
}

function setApellido($apellido) {
    $this->apellido = $apellido;
}

function setEdad($edad) {
    $this->edad = $edad;
}

function setSaldo($saldo) {
    $this->saldo = $saldo;
}

}

function muestraGlobal($nombre, $apellido) {
return "nombre: " . $nombre . $apellido;
}

$pepe = new Persona("pepe", "sanchez", 20, 300.50);
$juan = new Persona("juan", "jimenez", 30, 400.20);


echo $pepe->getNombre();
$pepe->setNombre("pepe2");
$pepe->setNombre("pepe2234234324234swerfrfsf");


echo $pepe->getNombre();


echo "<br/>muestra pepe: " . $pepe->muestra() . "<br/>";
echo "<br/>muestra juan: " . $juan->muestra();

echo "<br/>aumento saldo a juan en 200";
$juan->ingresa(200);
echo "<br/>muestra juan: " . $juan->muestra();

echo "<br/>retiramos saldo a pepe 300";
$pepe->retira(300);
echo "<br/>muestra pepe: " . $pepe->muestra() . "<br/>";

echo "<br/>retiramos saldo a pepe 300";
$pepe->retira(300);
echo "<br/>muestra pepe: " . $pepe->muestra() . "<br/>";

?>  
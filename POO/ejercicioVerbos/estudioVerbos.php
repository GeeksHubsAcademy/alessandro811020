<?php
class Verbo{

    private $presente='';
    private $pasado='';
    private $pasadoPerfecto='';
    private $traduccion='';

    //constructor
    public function __construct($presente,$pasado,$pasadoPerfecto,$traduccion){
        $this->presente= $presente;
        $this->pasado= $pasado;
        $this->pasadoPerfecto= $pasadoPerfecto;
        $this->traduccion= $traduccion;
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

    public function __toString(){
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


$insersion='';
$resultadoBusqueda='A buscar';

$verbos=array(new Verbo('get','got','got','obtener'),
            new Verbo('go','went','gone','ir'),
            new Verbo('begin','began','begun','empezar'),
            new Verbo('bite','bit','bitten','morder'),
            new Verbo('sing','sang','sung','cantar'),
            new Verbo('speak','spoke','spoken','hablar'),
            new Verbo('keep','kept','kept','mantener'),
            new Verbo('lead','led','led','dirigir'),
            new Verbo('bring','brought','brought','traer'),
            new Verbo('hurt','hurt','hurt','herir'),
            new Verbo('spend','spent','spent','gastar'),
            new Verbo('leave','left','left','dejar'),
            new Verbo('hold ','held','held','sostener'),
            new Verbo('know','knew','know','obtener'),
            new Verbo('sleep','slept','slept','dormir'));

if (empty($_POST['presente'])&&empty($_POST['pasado'])&&empty($_POST['presentePerfecto'])&&empty($_POST['traduccion'])) {
    $insersion="Agregue los datos";
}else{
    $agregar=array_push($verbos,new Verbo($_POST['presente'],$_POST['pasado'],$_POST['pasadoPerfecto'],$_POST['traduccion']));
    $insersion='Se ha agregado la forma verbal correctamente';
}

foreach ($verbos as $verbo) {
    echo $verbo;
}

if (strlen($_POST['verboBuscar'])>0) {
    foreach ($verbos as $verbo) {
        if ($verbo->esta($_POST['verboBuscar'])) {
            $resultadoBusqueda=$verbo;
        }
    }
}else{
    $resultadoBusqueda="No hay forma verbal a buscar";
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ejercicio Referido a los verbos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <h4>Insertar verbos al estudio temporal</h4>
        <form method="POST">
            <label for="presente">Presente: <span><em>(requerido)</em></span></label>
            <input type="text" name="presente" required/>
            <label for="pasado">Pasado: <span><em>(requerido)</em></span></label>
            <input type="text" name="pasado" required/>
            <label for="pasadoPerfecto">Pasado Perfecto: <span><em>(requerido)</em></span></label>
            <input type="text" name="pasadoPerfecto" required/>
            <label for="traduccion">Traducción: <span><em>(requerido)</em></span></label>
            <input type="text" name="traduccion" required/>
            <input name="submit" type="submit" value="Añadir"/>
        </form>
        <p><?php echo $insersion ?></p>
        <form method="POST">
            <label for="verboBuscar">Forma Verbal a Buscar: <span><em>(requerido)</em></span></label>
            <input type="text" name="verboBuscar" required/>
            <input name="submit" type="submit" value="Buscar"/>
        </form>
        <p><?php echo $resultadoBusqueda ?></p>

        
</body>
</html>
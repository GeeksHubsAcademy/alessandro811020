<?php
    try{
        $db=new PDO('mysql:host=127.0.0.1;dbname=cursophp', 'root', '');
    }catch(PDOException $e){
        die("Imposible conectar y crear: ".$e->getMessage());
    }

    try{
        $idBuscar=$_POST['id'];
        $nombre=$_POST['nombre'];
        $usuario=$_POST['usuario'];
        $contrasena=$_POST['contrasena'];
        $edad=$_POST['edad'];
        $personasABuscar="UPDATE usuarios SET nombre='".$nombre."', usuario='".$usuario."', contrasena='".$contrasena."', edad=".$edad." WHERE id=".$idBuscar."";
        $stmt=$db->prepare($personasABuscar);
        $stmt->execute();
        echo "<h4>SE HA ACTUALIZADO CORRECTAMENTE EL USUARIO</h4><br/>";
        echo "<a href='paginaEjercicio6.php'>Volver atras</a>";

    }catch (Exception $e){
        echo "Fallida la búsqueda ".$e->getMessage();
    }

?>
<?php    
    try{
        $db=new PDO('mysql:host=127.0.0.1;dbname=cursophp', 'root', '');
    }catch(PDOException $e){
        die("Imposible conectar y crear: ".$e->getMessage());
    }
    try{
        $idBuscar=$_POST['id'];
        $contadorInicio=0;
        $contadorDespues=0;

        $personasInicioBorrado="SELECT * FROM usuarios";
        $stmt1=$db->prepare($personasInicioBorrado);
        $stmt1->execute();
        while ($result=$stmt1->fetch(PDO::FETCH_ASSOC)) {
            $contadorInicio+=1;
        }

        $personasABuscar="DELETE FROM usuarios WHERE id=".$idBuscar."";
        $stmt2=$db->prepare($personasABuscar);
        $result=$stmt2->execute();
        
        $personasDespuesBorrado="SELECT * FROM usuarios";
        $stmt3=$db->prepare($personasInicioBorrado);
        $stmt3->execute();
        while ($result=$stmt3->fetch(PDO::FETCH_ASSOC)) {
            $contadorDespues+=1;
        }

        if($contadorDespues < $contadorInicio) {
            echo '<p>Los datos se han eliminado correctamente.</p>';
        }else{
            echo '<p>Error al eliminar los campos en la tabla.</p>';
        }
        echo "<a href='paginaEjercicio7.php'>Volver atras</a>";

    }catch (Exception $e){
        echo "Fallida la búsqueda ".$e->getMessage();
    }


?>
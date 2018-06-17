<?php    
    try{
        $db=new PDO('mysql:host=127.0.0.1;dbname=cursophp', 'root', '');
    }catch(PDOException $e){
        die("Imposible conectar y crear: ".$e->getMessage());
    }

    if (empty($_POST['id'])) {
        echo "<h4>Esperando búsqueda</h4>";
    }else{
        try{
            $idBuscar=$_POST['id'];
            $personasABuscar="SELECT * FROM usuarios WHERE id LIKE ".$idBuscar."";
            $stmt=$db->prepare($personasABuscar);
            $stmt->execute();
            echo "<h4>Modifique los datos de la persona identificada</h4>";
            echo "<form method='POST'action='usuarioModificado.php'>";
            while ($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($result['id']===null) {
                    echo "<h4>El usuario solicitado no existe</h4>";
                }else{
                    echo "<label for='id'>ID: </label>";
                    echo "<input type='text' name='id' value='".$result['id']."'/>";
                    echo "<label for='nombre'>Nombre: </label>";
                    echo "<input type='text' name='nombre' value='".$result['nombre']."'/>";
                    echo "<label for='usuario'>Usuario: </label>";
                    echo "<input type='text' name='usuario' value='".$result['usuario']."'/>";
                    echo "<label for='contrasena'>Contraseña:</label>";
                    echo "<input type='text' name='contrasena' value='".$result['contrasena']."'/>";
                    echo "<label for='edad'>Edad: </label>";
                    echo "<input type='text' name='edad' value='".$result['edad']."'/>";
                    echo "<input name='submit' type='submit' value='Actualizar'/>";
                }
            }
            echo "</form>";
            echo "<a href='paginaEjercicio6.php'>Volver atras</a>";

        }catch (Exception $e){
            echo "Fallida la búsqueda ".$e->getMessage();
        }
        
}

?>
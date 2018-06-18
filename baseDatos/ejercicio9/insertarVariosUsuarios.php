<?php    
    try{
        $db=new PDO('mysql:host=127.0.0.1;dbname=cursophp', 'root', '');
    }catch(PDOException $e){
        die("Imposible conectar y crear: ".$e->getMessage());
    }

    $datos=$_POST['datos'];
    $arrayTodosUsuarios= explode(';',$datos);

    foreach ($arrayTodosUsuarios as $usuario) {
        $camposUsuario=explode(',',$usuario);
        $nombreUsuario=$camposUsuario[0];
        $usuarioUsuario=$camposUsuario[1];
        $contrasenaUsuario=$camposUsuario[2];
        $edadUsuario=$camposUsuario[3];
        try{
            $stmt= $db->prepare("INSERT INTO usuarios (nombre, usuario, contrasena, edad) VALUES ('{$nombreUsuario}','{$usuarioUsuario}','{$contrasenaUsuario}',{$edadUsuario})");
            $stmt->execute();    
        }catch (Exception $e){
            echo "Fallida la búsqueda ".$e->getMessage();
        }
    }

    echo "<h4>Se han añadido todos los usuarios solicitados</h4>";
    echo "<a href='paginaEjercicio9.php'>Volver atras</a>";


?>
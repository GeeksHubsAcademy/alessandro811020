<?php
    $resultadoInscripcion='';
    $resultadoBusqueda='';
    $nombre='';
    $usuario='';
    $contrasena='';
    $edad=0;
    $nombreBuscar='';
    
    try{
        $db=new PDO('mysql:host=127.0.0.1;dbname=cursophp', 'root', '');
        //$db->exec("CREATE TABLE usuarios (id INT PRIMARY KEY AUTO_INCREMENT, nombre VARCHAR(100), usuario VARCHAR(100), contrasena VARCHAR(100),edad INT)");
    }catch(PDOException $e){
        die("Imposible conectar y crear: ".$e->getMessage());
    }
    
    try{
        if(empty($_POST['nombre'])&&empty($_POST['usuario'])&&empty($_POST['contrasena'])&&empty($_POST['edad'])){
            $resultadoInscripcion='Rellene los datos de inscripción';
        }else{
            $nombre=$_POST['nombre'];
            $usuario=$_POST['usuario'];
            $contrasena=$_POST['contrasena'];
            $edad=$_POST['edad'];
            $stmt= $db->prepare("INSERT INTO usuarios (nombre, usuario, contrasena, edad) VALUES ('{$nombre}','{$usuario}','{$contrasena}',{$edad})");
            $stmt->execute();
            $resultadoInscripcion='Se ha insertado correctamente. Rellene nuevos datos si es necesario';
        }
    }catch (Exception $e) {
        echo "Ha fallado la inserción: " . $e->getMessage();
    }
    $nombre='';
    $usuario='';
    $contrasena='';
    $edad=0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulario de Registro Ejercicio 4 Base de Datos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h4>Formulario de Registro</h4>
    <form method="POST">
        <label for="nombre">Nombre: <span><em>(requerido)</em></span></label>
        <input type="text" name="nombre" required/>
        <label for="usuario">Usuario: <span><em>(requerido)</em></span></label>
        <input type="text" name="usuario" required/>
        <label for="contrasena">Contraseña: <span><em>(requerido)</em></span></label>
        <input type="text" name="contrasena" required/>
        <label for="edad">Edad: <span><em>(requerido)</em></span></label>
        <input type="text" name="edad" required/>
        <input name="submit" type="submit" value="Suscribirse"/>
    </form>
    <p style="color:red"><?php echo $resultadoInscripcion?></p>
    <h4>Buscar usuario: </h4>
    <form method="POST">
        <label for="busqueda">Buscar por nombre: </label>
        <input type="text" name="busqueda"/>
        <input name="submit" type="submit" value="Buscar"/>
    </form>
    <?php 
        if (empty($_POST['busqueda'])) {
            echo "<h4>Esperando búsqueda</h4>";
        }else{
            try{
                $nombreBuscar=$_POST['busqueda'];
                $personasABuscar="SELECT * FROM usuarios WHERE nombre LIKE '%".$nombreBuscar."%'";
                $stmt=$db->prepare($personasABuscar);
                $stmt->execute();
                echo "<table border=1>";
                echo "<tr><th>Nombre</th><th>Usuario</th><th>Contrasena</th><th>Edad</th></tr>";
                while ($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>".$result['nombre']."</td><td>".$result['usuario']."</td><td>".$result['contrasena']."</td><td>".$result['edad']."</td></tr>";
                }
                echo "</table>";
            }catch (Exception $e){
                echo "Fallida la búsqueda ".$e->getMessage();
            }
    }
    ?>
</body>
</html>
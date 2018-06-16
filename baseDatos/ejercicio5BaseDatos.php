<?php
    $resultadoBusqueda='';
    $usuario='';
    $contrasena='';
    
    try{
        $db=new PDO('mysql:host=127.0.0.1;dbname=cursophp', 'root', '');
        //$db->exec("CREATE TABLE usuarios (id INT PRIMARY KEY AUTO_INCREMENT, nombre VARCHAR(100), usuario VARCHAR(100), contrasena VARCHAR(100),edad INT)");
    }catch(PDOException $e){
        die("Imposible conectar y crear: ".$e->getMessage());
    }
    
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulario de Login Ejercicio 5 Base de Datos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h4>Formulario de Entrada</h4>
    <form method="POST">
        <label for="usuario">Usuario: <span><em>(requerido)</em></span></label>
        <input type="text" name="usuario" required/>
        <label for="contrasena">Contraseña: <span><em>(requerido)</em></span></label>
        <input type="text" name="contrasena" required/>
        <input name="submit" type="submit" value="Acceder"/>
    </form>
    <?php 
        
        try{
            if(empty($_POST['usuario'])&&empty($_POST['contrasena'])){
                $resultadoInscripcion='Rellene los datos de Acceso';
            }else{
                $usuario=$_POST['usuario'];
                $contrasena=$_POST['contrasena'];
                try{
                    $nombreBuscar=$_POST['usuario'];
                    $personasABuscar="SELECT * FROM usuarios WHERE usuario LIKE '".$nombreBuscar."'";
                    $stmt=$db->prepare($personasABuscar);
                    $stmt->execute();
                    
                    echo "<table border=1>";
                    echo "<tr><th>Nombre</th><th>Usuario</th><th>Contrasena</th><th>Edad</th></tr>";
                    while ($result=$stmt->fetch(PDO::FETCH_ASSOC)) {

                        if ($result['contrasena']===$contrasena) {
                            echo "<tr><td>".$result['nombre']."</td><td>".$result['usuario']."</td><td>".$result['contrasena']."</td><td>".$result['edad']."</td></tr>";
                        }else{
                            echo "<p>Contraseña Incorrecta</p>";
                        }
                    }
                    echo "</table>";
                }catch (Exception $e){
                    echo "Fallida la búsqueda ".$e->getMessage();
                }
            }
        }catch (Exception $e) {
            echo "Ha fallado la inserción: " . $e->getMessage();
        }   
    ?>
</body>
</html>
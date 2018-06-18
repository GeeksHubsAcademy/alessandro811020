<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulario para Inserción de Varios Usuarios a la vez Ejercicio 9</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h4>Escriba los datos de los usuarios separados por <en>;</en> y los campos en <en>,</en></h4>
    <form method="POST" action="insertarVariosUsuarios.php">
        <label for="variosUsuarios">Cadena de Datos: </label>
        <input type="text" name="datos"/>
        <input name="submit" type="submit" value="Insertar"/>
    </form>
    
</body>
</html>
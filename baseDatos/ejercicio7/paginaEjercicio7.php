<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Solicitud para eliminación Ejercicio 7 de Base de Datos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h4>Escriba el Id del usuario que desea eliminar</h4>
    <form method="POST" action="eliminarUsuario.php">
        <label for="busqueda">Id del Usuario: </label>
        <input type="text" name="id" required/>
        <input name="submit" type="submit" value="Eliminar"/>
    </form>
    
</body>
</html>
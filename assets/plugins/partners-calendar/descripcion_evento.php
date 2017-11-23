<?php    
    //incluimos nuestro archivo config
    include 'config.php'; 
    // Incluimos nuestro archivo de funciones
    include 'funciones.php';
    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);
    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT * FROM appointment WHERE id = $id");
    // Obtenemos los datos
    $row = $bd->fetch_assoc();
    // titulo 
    $titulo=$row['title'];
    // cuerpo
    $evento=$row['body'];
    // Fecha inicio
    $inicio=$row['inicio_normal'];
    // Fecha Termino
    $final=$row['final_normal'];
    // Eliminar evento
    if (isset($_POST['eliminar_evento'])) 
    {
        $id  = evaluar($_GET['id']);
        $sql = "DELETE FROM appointment WHERE id = $id";
        if ($conexion->query($sql)) 
        {
            echo "Evento eliminado";
        }
        else
        {
            echo "El evento no se pudo eliminar";
        }
    }
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?=$titulo?></title>
</head>
<body>
    <h2>Información</h2>
	<h3><?php echo $titulo; ?></h3>
	<hr>
    <b>Fecha inicio:</b> <?php echo $inicio; ?>
    <b>Fecha termino:</b> <?php echo $final; ?>
 	<p><?php echo $evento; ?></p>
</body>
<form action="" method="post">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</form>
</html>

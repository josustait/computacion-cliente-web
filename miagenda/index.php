<html>
    <head >
	<meta charset="UTF-8">
	<title>****Mi Agenda De Tareas****</title> 
	<!--Se creó un arhivo de css para los estilos de la tabla
		para los botones se anexó el estilo en el index -->
	<link rel="stylesheet" href="tabla.css">
	<style type="text/css">
	.btn-success{
	text-decoration: none;
	padding: 10px;
	font-weight:600;
	font-size: 20px;
	color: #FFFFFF;
	background-color: #4DD105;
	border-radius: 6px;
	border: 2px solid #0016B0;
	align: center;
	}
	.btn-update{
	text-decoration: none;
	padding: 10px;
	font-weight:600;
	font-size: 20px;
	color: #FFFFFF;
	background-color: #1883BA;
	border-radius: 6px;
	border: 2px solid #0016B0;
	align: center;
	}
	.btn-delete{
	text-decoration: none;
	padding: 10px;
	font-weight:600;
	font-size: 20px;
	color: #F5FFFF;
	background-color: #C7090E;
	border-radius: 6px;
	border: 2px solid #0016B0;
	align: center;
	}

	</style>
	<!--Agregué la librería de Jquery versión 3.4.1 y la renombré a jquery como medida de
       seguridad para que no identifiquen facilmente que tipo de versión se emplea -->
	<script src="jquery.js">
	<!--En html5 ya no es necesario colocar type="text/javascript"
        solo la palabra script, ya que a partir de html5, java script
        es el lenguaje por default	-->
	<script type="text/javascript">
	
	</script>
	</head>
<body>
<div id= "header">
	<h2><p align="right">
	<!--Con este código jquery estoy introduciendo la fecha actual a la agenda -->
	<script type="text/javascript">
		var f = new Date();
		document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
	</script>
	</p> </h2>
    <h1>
    <p align="center">Mi Agenda de Tareas</p></h1>
</div>
<div id="main-container">
<table align="center" border='1'>
    <thead>
    <tr>
    <th>QTY</th>
    <th>Actividad</th>
    <th>FechaEntrega</th>
    </tr>
    </thead>
<tbody>
<?php
include 'config/class.conexion.php';
$db = new conexion();
$consulta = "SELECT * FROM actividadesmaestria ORDER BY FechaEntrega ASC ";
$res_consulta= mysqli_query($db, $consulta);
while($rows=mysqli_fetch_assoc($res_consulta))
{
    echo "<tr>";
    echo "<td>"; echo $rows['QTY']; echo "</td>";
    echo "<td>"; echo $rows['Actividad']; echo "</td>";
    echo "<td>"; echo $rows['FechaEntrega']; echo "</td>";
    echo "<td> <a href='update.php?QTY=".$rows['QTY']."'><button type='button' class='btn-update'>Actualizar</button></a> </td>";
    echo "<td> <a href='delete.php?QTY=".$rows['QTY']."'><button type='button' class='btn-delete'>Eliminar</button></a> </td>";
    echo "</tr>"; 
}
   // mysqli_close($db);
?>
</tbody>
</table>
</div>
<div id='footer'>
    <br><br>
    <form class="Nueva" action ="nuevaAct.php" method='POST' style="margin: auto; width: 800px; border-collapse; separate; border-spacing: 10px 5px;">
     <button type="submit" class="btn-success" align="center"> Nueva Actividad</button>
	</form>
	<!--Con este código de Jquery lo que se está haciendo es que 
		cuando se pase el puntero del mouse por encima del botón
		cambie de nombre de Nueva actividad a crear -->
	<script type="text/javascript">
	$(".btn-success").hover (
	function()
	{
		$(".btn-success").html('Crear');

	},
	function()
	{
		$(".btn-success").html('Nueva Actividad');
	});
	</script>
</div>
</body>
</html>
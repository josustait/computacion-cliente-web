<?php
NuevaActividad ($_POST['Actividad'], $_POST['FechaEntrega'] );
function NuevaActividad($Actividad, $FechaEntrega)
{
    include 'config/class.conexion.php';
    $db = new conexion();
    $sql_crea="INSERT INTO actividadesmaestria (Actividad, FechaEntrega) VALUES ('".$Actividad."', '".$FechaEntrega."') ";
    $db->query($sql_crea) or die ("Error al capturar Actividad".mysqli_error($db));
}
?>
<script type="text/javascript">
alert("Actividad creada correctamente");
window.location.href='index.php';
</script>

<?php
/*Se obtiene el valor de lo que contiene en QTY con la variable global GET*/
EliminarActividad($_GET['QTY']);
function EliminarActividad($QTY)
{
include 'config/class.conexion.php';
$db = new conexion();
    $sql_del="DELETE FROM actividadesmaestria WHERE QTY='".$QTY."' ";
    $db->query($sql_del) or die ("Error al tratar de eliminar actividad ".mysqli_error($db));
}
?>

<script type="text/javascript">
    alert("Se ha eliminado actividad");
    window.location.href='index.php';
</script>
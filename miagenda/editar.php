<?php
include 'config/class.conexion.php';
EditActividad($_POST['QTY'], $_POST['Actividad'], $_POST['FechaEntrega']);

function EditActividad($QTY, $Actividad, $FechaEntrega )
{
 $db= new conexion();
 $sql_edit="UPDATE actividadesmaestria SET QTY='".$QTY."', Actividad='".$Actividad."', FechaEntrega='".$FechaEntrega."' WHERE QTY='".$QTY."' ";
 $db->query($sql_edit) or die ("Error al actualizar Actividad".mysqli_error());
}
?>
<script type="text/javascript">
alert("Actividad Actualizada exitosamente!!");
 window.location.href='index.php';
</script>
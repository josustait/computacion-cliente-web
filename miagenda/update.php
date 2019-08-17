<HTML>
    <HEAD><H1 ALIGN='CENTER' color='3371FF'>Actividad Actual</H1></HEAD>
<BODY>
<div id='Consulta'>
<TABLE BORDER='1' align= 'center'>
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

if (isset ($_GET['QTY']))
{
    $output =$_GET['QTY'];
    //echo $output;

$db= new conexion();
    $sql = "SELECT * FROM actividadesmaestria WHERE QTY = '".$output."'";

     //echo $sql;
    $res_consulta= mysqli_query($db, $sql);
    while($rows=mysqli_fetch_assoc($res_consulta))
    {
    echo "<tr>";
    echo "<td>"; echo $rows['QTY']; echo "</td>";
    echo "<td>"; echo $rows['Actividad']; echo "</td>";
    echo "<td>"; echo $rows['FechaEntrega']; echo "</td>";
    echo "</tr>"; 
            
    }
}
?>
</tbody>
</TABLE>
</div>
<div id='Editar'>
<TABLE>
<tbody>
<?php

    $output =ConsultaActividad($_GET['QTY']);
    //echo $output;
    function ConsultaActividad($output)
    {
    $db= new conexion();
    $sql = "SELECT * FROM actividadesmaestria WHERE QTY = '".$output."'";
     //$res_consulta= mysqli_query($db, $sql);
    $res_consulta = $db->query($sql) or die ("Error al Consultar Actividad".mysqli_error($db));
        
    $rows=mysqli_fetch_assoc($res_consulta) or die (mysqli_error($rows));
     return
         [
            $rows['QTY'],
            $rows['Actividad'],
            $rows['FechaEntrega']
         ];
    }


?>
</tbody>
</TABLE>
</div>    
<div id='Modificar' style="margin: auto; width: 800px; border-collapse; separate; border-spacing: 10px 5px;" align='center' color='3371FF'> <span><h1 align='center' >Editar Actividad</h1></span>
<br>
<form action ="editar.php" method='POST' style="margin: auto; width: 800px; border-collapse; separate; border-spacing: 10px 5px;"> 

<table>
    <tr>
    <td><label align='center'>QTY:</label></td>
        <td><input type="number_format" id="QTY" name="QTY" value="<?php echo $output[0]?>" ></td><br><br>
        <td><label>ACTIVIDAD:</label></td>
    <td><textarea style="border-radius: 10px;" rows="5" cols="50" id="Actividad" name="Actividad" ><?php echo $output[1]?></textarea></td><br><br>
    <td><label>Fecha De Entrega:</label></td>
    <td><input type="date" id="FechaEntrega" name="FechaEntrega" value="<?php echo $output[2]?>"></td>
    </tr>
</table>
    <br>
    <br><br>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
</div>    
</BODY>
</HTML>
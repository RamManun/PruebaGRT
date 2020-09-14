<?php
include "dbRegistro.php";
$con=mysqli_connect($host,$user,$pass,$db);
header('Content-type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename=excelVentas.xls');
header('Pragma: no-cache');
header('Expires: 0');

?>
<h4 align="center">GR TECNOLOGIA S. DE R.L DE C.V.</h4>
<h5 align="center">LISTA DE VENTAS</h5>

<table width="80%" border="1" align="center">
  <tr bgcolor="#5970B2" align="center" class="encabezadoTabla">
    <td width="10%" bgcolor="#3399CC">No. Referencia</td>
    <td width="25%" bgcolor="#3399CC">No. Factura</td>
    <td width="10%" bgcolor="#3399CC">Fecha</td>
    <td width="20%" bgcolor="#3399CC">IdCliente</td>
    <td width="35%" bgcolor="#3399CC">Cliente</td>
    <td width="15%" bgcolor="#3399CC">Sub Total</td>
    <td width="10%" bgcolor="#3399CC">Descuento</td>
    <td width="15%" bgcolor="#3399CC">15%ISV</td>
    <td width="15%" bgcolor="#3399CC">Total</td>
    <td width="15%" bgcolor="#3399CC">Saldo</td>
    <td width="15%" bgcolor="#3399CC">C Status</td>
    <td width="15%" bgcolor="#3399CC">Id Almacen</td>
    <td width="15%" bgcolor="#3399CC">Id Usuario</td>
  </tr>
  <?php  
   $query="SELECT id, No_Referencia, No_Factura, Fecha, IdCliente, Cliente, sub_Total, Descuento, Impuesto_15, Total, Saldo, C_Status, IdAlmacen, 
   IdUsuario  from ventas";
   $res=mysqli_query($con,$query);
  
   while($row=mysqli_fetch_assoc($res))
  {
  ?>
  <tr>
    <td><?php echo utf8_decode($row['No_Referencia'])?></td>
    <td><?php echo utf8_decode($row['No_Factura'])?></td>
    <td><?php echo utf8_decode($row['Fecha'])?></td>
    <td><?php echo utf8_decode($row['IdCliente'])?></td>
    <td><?php echo utf8_decode($row['Cliente'])?></td>
    <td><?php echo utf8_decode($row['sub_Total'])?></td>
    <td><?php echo utf8_decode($row['Descuento'])?></td>
    <td><?php echo utf8_decode($row['Impuesto_15'])?></td>
    <td><?php echo utf8_decode($row['Total'])?></td>
    <td><?php echo utf8_decode($row['Saldo'])?></td>
    <td><?php echo utf8_decode($row['C_Status'])?></td>
    <td><?php echo utf8_decode($row['IdAlmacen'])?></td>
    <td><?php echo utf8_decode($row['IdUsuario'])?></td>
    
    </tr>
  <?php 
  } //cerrar el while
  ?>
</table>
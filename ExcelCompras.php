<?php
include "dbRegistro.php";
$con=mysqli_connect($host,$user,$pass,$db);
header('Content-type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename=excelCompras.xls');
header('Pragma: no-cache');
header('Expires: 0');

?>
<h4 align="center">GR TECNOLOGIA S. DE R.L DE C.V.</h4>
<h4 align="center">LISTA DE COMPRAS</h4>
<table width="80%" border="1" align="center">
  <tr bgcolor="#5970B2" align="center" class="encabezadoTabla">
    <td width="10%" bgcolor="#3399CC">Clasificacion</td>
    <td width="15%" bgcolor="#3399CC">Id Proveedor</td>
    <td width="15%" bgcolor="#3399CC">Proveedor</td>
    <td width="10%" bgcolor="#3399CC">Fecha</td>
    <td width="15%" bgcolor="#3399CC">No. Documento</td>
    <td width="15%" bgcolor="#3399CC">Documento Fiscal</td>
    <td width="15%" bgcolor="#3399CC">Sub Total</td>
    <td width="15%" bgcolor="#3399CC">Importe Excento</td>
    <td width="15%" bgcolor="#3399CC">15%ISV</td>
    <td width="15%" bgcolor="#3399CC">Total</td>
    <td width="15%" bgcolor="#3399CC">Concepto</td>
    <td width="15%" bgcolor="#3399CC">Saldo</td>
    <td width="15%" bgcolor="#3399CC">Id Forma de Pago</td>
    <td width="15%" bgcolor="#3399CC">Referencia</td>
  </tr>
  <?php  
   $query="SELECT id, Clasificacion, idProveedor,Proveedor, Fecha, No_documento, Documento_fiscal, Sub_Total, 
   Importe_excento, 15_Porciento, Total, Concepto, Saldo, IdFormadePago, Referencia from compras";
   $res=mysqli_query($con,$query);
  
   while($row=mysqli_fetch_assoc($res))
  {
  ?>
  <tr>
    <td><?php echo utf8_decode($row['Clasificacion'])?></td>
    <td><?php echo utf8_decode($row['idProveedor'])?></td>
    <td><?php echo utf8_decode($row['Proveedor'])?></td>
    <td><?php echo utf8_decode($row['Fecha'])?></td>
    <td><?php echo utf8_decode($row['No_documento'])?></td>
    <td><?php echo utf8_decode($row['Documento_fiscal'])?></td>
    <td><?php echo utf8_decode($row['Sub_Total'])?></td>
    <td><?php echo utf8_decode($row['Importe_excento'])?></td>
    <td><?php echo utf8_decode($row['15_Porciento'])?></td>
    <td><?php echo utf8_decode($row['Total'])?></td>
    <td><?php echo utf8_decode($row['IdFormadePago'])?></td>
    <td><?php echo utf8_decode($row['Concepto'])?></td>
    <td><?php echo utf8_decode($row['Saldo'])?></td>
    <td><?php echo utf8_decode($row['Referencia'])?></td>
    
    </tr>
  <?php 
  } //cerrar el while
  ?>
</table>
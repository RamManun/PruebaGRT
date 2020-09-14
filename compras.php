<!-- Content Wrapper. Contains page content -->
<?php
  include_once "dbRegistro.php";
  $con=mysqli_connect($host,$user,$pass,$db);
  if( isset($_REQUEST['idBorrar2'])){
    $id= mysqli_real_escape_string($con, $_REQUEST['idBorrar2']??'');
    $query="DELETE from compras where id='".$id."';";
    $res=mysqli_query($con, $query);
    if($res){
      ?>
      <div class="alert alert-warning float-right" role="alert">
        compra Borrada con exito
      </div>
      <?php
    }
    else{
      ?>
      <div class="alert alert-danger" role="alert">
        Error al borrar <?php echo mysqli_error($con);?>
      </div>
      <?php
    }
  }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compras</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              <table  class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Clasificacion</th>
                  <th>Id Proveedor</th>
                  <th>Proveedor</th>
                  <th>Fecha</th>
                  <th>No Documento</th>
                  <th>Documento Fiscal</th>
                  <th>Sub Total</th>
                  <th>Importe Exento</th>
                  <th>15%ISV</th>
                  <th>Total</th>
                  <th>Id Forma Pago</th>
                  <th>Concepto</th>
                  <th>Saldo</th>
                  <th>Referencia</th>
                  <th>Acciones
                      <a href="panel.php?modulo=agregarCompras"><i class="fa fa-plus" aria-hidden="true"></i></a>
                  </th>
                </tr>
                </thead>
                <tbody>
                    <?php
                         
                         $query="SELECT id, Clasificacion, idProveedor,Proveedor, Fecha, No_documento, Documento_fiscal, Sub_Total, 
                         Importe_excento, 15_Porciento, Total, Concepto, Saldo, IdFormadePago, Referencia from compras";
                         $res=mysqli_query($con,$query);
                        
                         while($row=mysqli_fetch_assoc($res)){                        
                    ?>
                        <tr>
                            <td><?php echo $row['Clasificacion']?></td>
                            <td><?php echo $row['idProveedor']?></td>
                            <td><?php echo $row['Proveedor']?></td>
                            <td><?php echo $row['Fecha']?></td>
                            <td><?php echo $row['No_documento']?></td>
                            <td><?php echo $row['Documento_fiscal']?></td>
                            <td><?php echo $row['Sub_Total']?></td>
                            <td><?php echo $row['Importe_excento']?></td>
                            <td><?php echo $row['15_Porciento']?></td>
                            <td><?php echo $row['Total']?></td>
                            <td><?php echo $row['IdFormadePago']?></td>
                            <td><?php echo $row['Concepto']?></td>
                            <td><?php echo $row['Saldo']?></td>
                            <td><?php echo $row['Referencia']?></td>
                            <td>
                                <a href="panel.php?modulo=editarCompra&id=<?php echo $row['id']?>" style="margin-right: 25px"><li class="fas fa-edit"></li></a>
                                <a href="panel.php?modulo=compras&idBorrar2=<?php echo $row['id']?>" class="text-danger borrarC"><li class="fas fa-trash"></li></a>
                            </td>
                        </tr>
                    <?php
                        }
                        ?>
                </tbody >
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <a href="ExcelCompras.php" style="margin-right: 25px" class="btn-primary btn"><li class="fas fa-file-excel"></li> Descargar en Excel</a>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
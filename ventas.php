<!-- Content Wrapper. Contains page content -->
<?php
  include_once "dbRegistro.php";
  $con=mysqli_connect($host,$user,$pass,$db);
  if( isset($_REQUEST['idBorrar3'])){
    $id= mysqli_real_escape_string($con, $_REQUEST['idBorrar3']??'');
    $query="DELETE from ventas where id='".$id."';";
    $res=mysqli_query($con, $query);
    if($res){
      ?>
      <div class="alert alert-warning float-right" role="alert">
        Venta Borrada con exito
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
            <h1>Ventas</h1>
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
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No. Referencia</th>
                  <th>No. Factura</th>
                  <th>Fecha</th>
                  <th>Id Cliente</th>
                  <th>Cliente</th>
                  <th>Sub Total</th>
                  <th>Descuento</th>
                  <th>15%ISV</th>
                  <th>Total</th>
                  <th>Saldo</th>
                  <th>C Status</th>
                  <th>Id Almacen</th>
                  <th>Id Usuario</th>
                  <th>Acciones
                      <a href="panel.php?modulo=agregarVentas"><i class="fa fa-plus" aria-hidden="true"></i></a>
                  </th>
                </tr>
                </thead>
                <tbody>
                    <?php
                         
                         $query="SELECT id, No_Referencia, No_Factura, Fecha, IdCliente, Cliente, sub_Total, Descuento, Impuesto_15, Total, Saldo, C_Status, IdAlmacen, IdUsuario from ventas;";
                         $res=mysqli_query($con,$query);
                         
                         while($row=mysqli_fetch_assoc($res)){                        
                    ?>
                        <tr>
                            <td><?php echo $row['No_Referencia']?></td>
                            <td><?php echo $row['No_Factura']?></td>
                            <td><?php echo $row['Fecha']?></td>
                            <td><?php echo $row['IdCliente']?></td>
                            <td><?php echo $row['Cliente']?></td>
                            <td><?php echo $row['sub_Total']?></td>
                            <td><?php echo $row['Descuento']?></td>
                            <td><?php echo $row['Impuesto_15']?></td>
                            <td><?php echo $row['Total']?></td>
                            <td><?php echo $row['Saldo']?></td>
                            <td><?php echo $row['C_Status']?></td>
                            <td><?php echo $row['IdAlmacen']?></td>
                            <td><?php echo $row['IdUsuario']?></td>
                            <td>
                                <a href="panel.php?modulo=editarVenta&id=<?php echo $row['id']?>" style="margin-right: 25px"><li class="fas fa-edit"></li></a>
                                <a href="panel.php?modulo=Venta&idBorrar3=<?php echo $row['id']?>" class="text-danger borrarV"><li class="fas fa-trash"></li></a>
                            </td>
                        </tr>
                    <?php
                        }
                        ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <a href="ExcelVentas.php" style="margin-right: 25px" class="btn-primary btn"><li class="fas fa-file-excel"></li> Descargar en Excel</a>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
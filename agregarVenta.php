<?php
    if( isset($_REQUEST['IngresarV'])){
        include_once "dbRegistro.php";
        $con=mysqli_connect($host, $user, $pass, $db);

        $No_Referencia = mysqli_real_escape_string($con, $_REQUEST['No_Referencia']??'') ;
        $No_Factura = mysqli_real_escape_string($con, $_REQUEST['No_Factura']??'') ;
        $Fecha = mysqli_real_escape_string($con, $_REQUEST['Fecha']??'') ;
        $IdCliente = mysqli_real_escape_string($con, $_REQUEST['IdCliente']??'') ;
        $Cliente = mysqli_real_escape_string($con, $_REQUEST['Cliente']??'') ;
        $Sub_Total = mysqli_real_escape_string($con, $_REQUEST['sub_Total']??'') ;
        $Descuento = mysqli_real_escape_string($con, $_REQUEST['Descuento']??'') ;
        $Impuesto_15 = mysqli_real_escape_string($con, $_REQUEST['Impuesto_15']??'') ;
        $Total = mysqli_real_escape_string($con, $_REQUEST['Total']??'') ;
        $Saldo = mysqli_real_escape_string($con, $_REQUEST['Saldo']??'') ;
        $C_Status = mysqli_real_escape_string($con, $_REQUEST['C_Status']??'') ;
        $IdAlmacen = mysqli_real_escape_string($con, $_REQUEST['IdAlmacen']??'') ;
        $IdUsuario = mysqli_real_escape_string($con, $_REQUEST['IdUsuario']??'') ;

        $query="INSERT INTO ventas 
        (No_Referencia, No_Factura, Fecha, IdCliente, Cliente, sub_Total, Descuento, Impuesto_15, Total, Saldo, C_Status, IdAlmacen, IdUsuario) VALUES
        ('".$No_Factura."','".$Fecha."','".$IdCliente."','".$Cliente."','".$Sub_Total."'
        ,'".$Descuento."','".$Impuesto_15."','".$Total."','".$Saldo."','".$C_Status."','".$IdAlmacen."','".$IdUsuario."');
        ";
        $res=mysqli_query($con,$query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=ventas&mensaje= venta ingresada existosamente"/>';
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
                Error al ingresar Ventas <?php echo mysqli_error($con); ?>
            </div>
            <?php
        }
    }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ingresar Ventas</h1>
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
              <form action="panel.php?modulo=agregarVentas" method="post">
                    <div class="form-group">
                    <label >No. Referencia</label>
                    <input type="text" name="No_Referencia" class="form-control col-4" required="required">
                  </div>   
                  <div class="form-group">
                    <label >No. Factura</label>
                    <input type="text" name="No_Factura" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Fecha</label>
                    <input type="date" name="Fecha" placeholder="yy-mm-dd" class="form-control col-2" required="required">
                  </div>
                  <div class="form-group">
                    <label >Id Cliente</label>
                    <input type="text" name="IdCliente" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Cliente</label>
                    <input type="text" name="Cliente"  class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Sub Total</label>
                    <input type="text" name="sub_Total" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Descuento</label>
                    <input type="text" name="Descuento" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >15%ISV</label>
                    <input type="text" name="Impuesto_15" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Total</label>
                    <input type="text" name="Total" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Saldo</label>
                    <input type="text" name="Saldo" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >C. Status</label>
                    <input type="text" name="C_Status" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >IdAlmacen</label>
                    <input type="text" name="IdAlmacen" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >IdUsuario</label>
                    <input type="text" name="IdUsuario" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="IngresarV">Ingresar</button>
                  </div>
                  
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
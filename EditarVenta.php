<?php
    include_once "dbRegistro.php";
    $con=mysqli_connect($host, $user, $pass, $db);
    if( isset($_REQUEST['editar3'])){
        
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
        $id = mysqli_real_escape_string($con, $_REQUEST['id']??'') ;

        $query="UPDATE ventas SET
        No_Referencia='".$No_Referencia."', No_Factura='".$No_Factura."', Fecha='".$Fecha."', IdCliente='".$IdCliente."', Cliente='".$Cliente."', sub_Total='".$Sub_Total."'
        , Descuento='".$Descuento."', Impuesto_15='".$Impuesto_15."', Total='".$Total."', Saldo='".$Saldo."'
        , C_Status='".$C_Status."', IdAlmacen='".$IdAlmacen."'
        WHERE id='".$id."'; ";
        $res=mysqli_query($con,$query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=ventas&mensaje= venta editada existosamente"/>';
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
                Error al editar <?php echo mysqli_error($con); ?>
            </div>
            <?php
        }
    }
    $id = mysqli_real_escape_string($con, $_REQUEST['id']??'') ;
    $query="SELECT id, No_Referencia, No_Factura, Fecha, IdCliente, Cliente, sub_Total, Descuento, Impuesto_15, Total, Saldo, C_Status, IdAlmacen, 
    IdUsuario from ventas where id='".$id."'; ";
    $res=mysqli_query($con, $query);
    $row=mysqli_fetch_assoc($res);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Venta</h1>
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
              <form action="panel.php?modulo=editarVenta" method="post">
                  <div class="form-group">
                    <label >No. Referencia</label>
                    <input type="text" name="No_Referencia" class="form-control col-4" value="<?php echo $row['No_Factura']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >No. Factura</label>
                    <input type="text" name="No_Factura" class="form-control col-4" value="<?php echo $row['No_Factura']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >Fecha</label>
                    <input type="date" name="Fecha" placeholder="yy-mm-dd" value="<?php echo $row['Fecha']?>" class="form-control col-2" required="required">
                  </div>
                  <div class="form-group">
                    <label >Id Cliente</label>
                    <input type="text" name="IdCliente" value="<?php echo $row['IdCliente']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Cliente</label>
                    <input type="text" name="Cliente"  value="<?php echo $row['Cliente']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Sub Total</label>
                    <input type="text" name="sub_Total" value="<?php echo $row['sub_Total']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Descuento</label>
                    <input type="text" name="Descuento" value="<?php echo $row['Descuento']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >15%ISV</label>
                    <input type="text" name="Impuesto_15" value="<?php echo $row['Impuesto_15']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Total</label>
                    <input type="text" name="Total" value="<?php echo $row['Total']?>" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label >Saldo</label>
                    <input type="text" name="Saldo" value="<?php echo $row['Saldo']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >C. Status</label>
                    <input type="text" name="C_Status" value="<?php echo $row['C_Status']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >IdAlmacen</label>
                    <input type="text" name="IdAlmacen" value="<?php echo $row['IdAlmacen']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >IdUsuario</label>
                    <input type="text" name="IdUsuario" value="<?php echo $row['IdUsuario']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                    <button type="submit" class="btn btn-primary" name="editar3">Editar</button>
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
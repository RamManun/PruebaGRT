<?php
    if( isset($_REQUEST['IngresarC'])){
        include_once "dbRegistro.php";
        $con=mysqli_connect($host, $user, $pass, $db);

        $Clasificacion = mysqli_real_escape_string($con, $_REQUEST['Clasificacion']??'') ;
        $IdProveedor = mysqli_real_escape_string($con, $_REQUEST['idProveedor']??'') ;
        $Proveedor = mysqli_real_escape_string($con, $_REQUEST['Proveedor']??'') ;
        $fecha = mysqli_real_escape_string($con, $_REQUEST['Fecha']??'') ;
        $No_Documento = mysqli_real_escape_string($con, $_REQUEST['No_documento']??'') ;
        $DocumentoFiscal = mysqli_real_escape_string($con, $_REQUEST['Documento_fiscal']??'') ;
        $SubTotal = mysqli_real_escape_string($con, $_REQUEST['Sub_Total']??'') ;
        $ImporteExcento = mysqli_real_escape_string($con, $_REQUEST['Importe_excento']??'') ;
        $Quince = mysqli_real_escape_string($con, $_REQUEST['15_Porciento']??'') ;
        $Total = mysqli_real_escape_string($con, $_REQUEST['Total']??'') ;
        $Concepto = mysqli_real_escape_string($con, $_REQUEST['Concepto']??'') ;
        $Saldo = mysqli_real_escape_string($con, $_REQUEST['Saldo']??'') ;
        $IdForma = mysqli_real_escape_string($con, $_REQUEST['IdFormadePago']??'') ;
        $Referencia = mysqli_real_escape_string($con, $_REQUEST['Referencia']??'') ;
        $ImgenFactura = $_FILES['ImagenFacturas']['name'];
        //$Almacenamiento = $_FILES['ImagenFacturas']['tmp_name'];
        //$ruta="images";

        //$ruta=$ruta."/".$ImgenFactura;

        //move_uploaded_file($Almacenamiento, $ruta);

        $query="INSERT INTO compras 
        (Clasificacion, Proveedor, Fecha, No_documento, Documento_fiscal, Sub_Total, Importe_excento,
        15_Porciento, Total, Concepto, Saldo, IdFormadePago, Referencia,idProveedor) VALUES
        ('".$Clasificacion."','".$Proveedor."','".$fecha."','".$No_Documento."','".$DocumentoFiscal."'
        ,'".$SubTotal."','".$ImporteExcento."','".$Quince."','".$Total."','".$Concepto."','".$Saldo."','".$IdForma."','".$Referencia."','".$IdProveedor."');
        ";
        $res=mysqli_query($con,$query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=compras&mensaje= compra ingresada existosamente"/>';
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
                Error al ingresar compras <?php echo mysqli_erro($con); ?>
            </div>
            <?php
        }
    }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ingresar compras</h1>
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
              <form action="panel.php?modulo=agregarCompras" method="post" >
                  <div class="form-group">
                    <label >Clasificacion</label>
                    <input type="text" name="Clasificacion" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Id Proveedor</label>
                    <input type="text" name="idProveedor" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Proveedor</label>
                    <input type="text" name="Proveedor" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Fecha</label>
                    <input type="date" name="Fecha" placeholder="yy-mm-dd" class="form-control col-2" required="required">
                  </div>
                  <div class="form-group">
                    <label >No Documento</label>
                    <input type="text" name="No_documento" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Documento Fiscal</label>
                    <input type="text" name="Documento_fiscal" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Sub Total</label>
                    <input type="text" name="Sub_Total" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Importe excento</label>
                    <input type="text" name="Importe_excento" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >15%ISV</label>
                    <input type="text" name="15_Porciento" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Total</label>
                    <input type="text" name="Total" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Concepto</label>
                    <input type="text" name="Concepto" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Saldo</label>
                    <input type="text" name="Saldo" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Id Forma de Pago</label>
                    <input type="text" name="IdFormadePago" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Referencia</label>
                    <input type="text" name="Referencia" class="form-control col-4" >
                  </div>
                  <!--<div class="form-group">
                    <label >Imagen de Factura</label>
                    <input type="file" name="ImagenFacturas" class="btn-primary btn" >
                  </div>-->
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="IngresarC">Ingresar</button>
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
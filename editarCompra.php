<?php
    include_once "dbRegistro.php";
    $con=mysqli_connect($host, $user, $pass, $db);
    if( isset($_REQUEST['editar2'])){
        
        $Clasificacion = mysqli_real_escape_string($con, $_REQUEST['Clasificacion']??'') ;
        $IdProveedor = mysqli_real_escape_string($con, $_REQUEST['idProveedor']??'') ;
        $Proveedor = mysqli_real_escape_string($con, $_REQUEST['Proveedor']??'') ;
        $Fecha = mysqli_real_escape_string($con, $_REQUEST['Fecha']??'') ;
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
        $id = mysqli_real_escape_string($con, $_REQUEST['id']??'') ;

        $query="UPDATE compras SET
        Clasificacion='".$Clasificacion."', idProveedor='".$IdProveedor."', Proveedor='".$Proveedor."', Fecha='".$Fecha."', No_documento='".$No_Documento."'
        , Documento_fiscal='".$DocumentoFiscal."', Sub_Total='".$SubTotal."', Importe_excento='".$ImporteExcento."', 15_Porciento='".$Quince."'
        , Total='".$Total."', Concepto='".$Concepto."', Saldo='".$Saldo."', IdFormadePago='".$IdForma."', Referencia='".$Referencia."'
        WHERE id='".$id."'; ";
        $res=mysqli_query($con,$query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=compras&mensaje= compra editada existosamente"/>';
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
                Error al editar <?php echo mysqli_error($con); ?>
            </div>
            <?php
        }
    }
    $id = mysqli_real_escape_string($con, $_REQUEST['id']??'') ;
    $query="SELECT id,Clasificacion, idProveedor, Proveedor, Fecha, No_documento, Documento_fiscal, Sub_Total, Importe_excento, 15_Porciento, Total,
    Concepto, Saldo, IdFormadePago, Referencia from compras where id='".$id."'; ";
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
            <h1>Editar Compra</h1>
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
              <form action="panel.php?modulo=editarCompra" method="post">
                  <div class="form-group">
                  <label >Clasificacion</label>
                    <input type="text" name="Clasificacion" class="form-control col-4" value="<?php echo $row['Clasificacion']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >Id Proveedor</label>
                    <input type="text" name="idProveedor" class="form-control col-4" value="<?php echo $row['idProveedor']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >Proveedor</label>
                    <input type="text" name="Proveedor" class="form-control col-4" value="<?php echo $row['Proveedor']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >Fecha</label>
                    <input type="date" name="Fecha" placeholder="yy-mm-dd" value="<?php echo $row['Fecha']?>" class="form-control col-2" required="required">
                  </div>
                  <div class="form-group">
                    <label >No Documento</label>
                    <input type="text" name="No_documento" value="<?php echo $row['No_documento']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Documento Fiscal</label>
                    <input type="text" name="Documento_fiscal" value="<?php echo $row['Documento_fiscal']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Sub Total</label>
                    <input type="text" name="Sub_Total" value="<?php echo $row['Sub_Total']?>" class="form-control col-4" required="required">
                  </div>
                  <div class="form-group">
                    <label >Importe excento</label>
                    <input type="text" name="Importe_excento" class="form-control col-4" value="<?php echo $row['Importe_excento']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >15%ISV</label>
                    <input type="text" name="15_Porciento" class="form-control col-4" value="<?php echo $row['15_Porciento']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >Total</label>
                    <input type="text" name="Total" class="form-control col-4" value="<?php echo $row['Total']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >Concepto</label>
                    <input type="text" name="Concepto" class="form-control col-4" value="<?php echo $row['Concepto']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >Saldo</label>
                    <input type="text" name="Saldo" class="form-control col-4" value="<?php echo $row['Saldo']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >Id Forma de Pago</label>
                    <input type="text" name="IdFormadePago" class="form-control col-4" value="<?php echo $row['IdFormadePago']?>" required="required">
                  </div>
                  <div class="form-group">
                    <label >Referencia</label>
                    <input type="text" name="Referencia" value="<?php echo $row['Referencia']?>" class="form-control col-4" >
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                    <button type="submit" class="btn btn-primary" name="editar2">Editar</button>
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
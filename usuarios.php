<!-- Content Wrapper. Contains page content -->
<?php
  include_once "dbRegistro.php";
  $con=mysqli_connect($host,$user,$pass,$db);
  if( isset($_REQUEST['idBorrar'])){
    $id= mysqli_real_escape_string($con, $_REQUEST['idBorrar']??'');
    $query="DELETE from usuarios where id='".$id."';";
    $res=mysqli_query($con, $query);
    if($res){
      ?>
      <div class="alert alert-warning float-right" role="alert">
        Usuario Borrado con exito
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
            <h1>Usuarios</h1>
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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Acciones
                      <a href="panel.php?modulo=crearUsuario"><i class="fa fa-plus" aria-hidden="true"></i></a>
                  </th>
                </tr>
                </thead>
                <tbody>
                    <?php
                         
                         $query="SELECT id, nombre, email from usuarios;";
                         $res=mysqli_query($con,$query);
                         
                         while($row=mysqli_fetch_assoc($res)){                        
                    ?>
                        <tr>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['email']?></td>
                            <td>
                                <a href="panel.php?modulo=editarUsuario&id=<?php echo $row['id']?>" style="margin-right: 25px"><li class="fas fa-edit"></li></a>
                                <a href="panel.php?modulo=usuarios&idBorrar=<?php echo $row['id']?>" class="text-danger borrar"><li class="fas fa-trash"></li></a>
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
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
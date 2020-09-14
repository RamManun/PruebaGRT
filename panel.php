<!DOCTYPE html>
<html>
  <?php
    session_start();
    session_regenerate_id(true);
    if(isset($_REQUEST['sesion']) && $_REQUEST['sesion']=="cerrar"){
      session_destroy();
      header("location: index.php");
    }
    if( isset($_SESSION['id']) == false){
      header("location: index.php");
    }
    $modulo=$_REQUEST['modulo']??'';
  ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Herramienta Administrativa | Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- DataTables -->
   <!--link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css"-->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
   <link rel="stylesheet" href="css/editor.dataTables.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
        <a class="nav-link" href="panel.php?modulo=editarUsuario&id=<?php echo $_SESSION['id'];?>">
          <i class="far fa-user"></i>
        </a>
        <a class="nav-link text-danger" href="panel.php?modulo=&sesion=cerrar" title="cerrar sesion">
          <i class="fas fa-sign-out-alt    "></i>
        </a>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/unnamed.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Registro Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a class="d-block"><?php echo $_SESSION["nombre"]; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a class="nav-link active">
              <i class="fa fa-laptop nav-icon" aria-hidden="true"></i>
              <p>
                Administracion
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="panel.php?modulo=usuarios" class="nav-link <?php echo ($modulo=="usuarios" || $modulo=="crearUsuario" || $modulo=="editarUsuario")? "active" : " ";?>">
                  <i class="far fa-user nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="panel.php?modulo=compras" class="nav-link <?php echo ($modulo=="compras" || $modulo=="agregarCompras" || $modulo=="editarCompra")? "active" : " ";?>">
                  <i class="fa fa-shopping-bag nav-icon" aria-hidden="true"></i>
                  <p>Compras</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="panel.php?modulo=ventas" class="nav-link <?php echo ($modulo=="ventas" || $modulo=="agregarVentas" || $modulo=="editarVenta")? "active" : " ";?>">
                  <i class="fa fa-table nav-icon" aria-hidden="true"></i>
                  <p>Ventas</p>
                </a>
              </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php

  if( isset($_REQUEST['mensaje'])){
    ?>
    <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <?php echo $_REQUEST['mensaje'] ?>
    </div>
    <?php
  }
    if($modulo=="usuarios"){
      include_once "usuarios.php";
    }
    if($modulo=="compras" || $modulo==""){
      include_once "compras.php";
    }
    if($modulo=="agregarCompras" ){
      include_once "agregarCompras.php";
    }
    if($modulo=="editarCompra"){
      include_once "editarCompra.php";
    }
    if($modulo=="ventas"){
      include_once "ventas.php";
    }
    if($modulo=="agregarVentas" ){
      include_once "agregarVenta.php";
    }
    if($modulo=="editarVenta"){
      include_once "editarVenta.php";
    }
    if($modulo=="crearUsuario"){
      include_once "crearUsuario.php";
    }
    if($modulo=="editarUsuario"){
      include_once "editarUsuario.php";
    }
    if($modulo=="crearProducto"){
      include_once "crearProducto.php";
    }
  ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<!--script src="plugins/datatables/jquery.dataTables.js"></script-->
<!--script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script-->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="js/dataTables.editor.min.js"></script>
 
<script>
  $(document).ready(function (){
    $(".borrar").click(function (e) {
      e.preventDefault();
      var res=confirm("Estas seguro quieres borrar este Usuario?");
      if(res==true){
        var link=$(this).attr("href");
        window.location=link;
      }
    })
  })
</script>
<script>
  $(document).ready(function (){
    $(".borrarC").click(function (e) {
      e.preventDefault();
      var res=confirm("Estas seguro quieres borrar esta Compra?");
      if(res==true){
        var link=$(this).attr("href");
        window.location=link;
      }
    })
  })
</script>
<script>
  $(document).ready(function (){
    $(".borrarV").click(function (e) {
      e.preventDefault();
      var res=confirm("Estas seguro quieres borrar esta Venta?");
      if(res==true){
        var link=$(this).attr("href");
        window.location=link;
      }
    })
  })
</script>
<script>
$(function () {
$('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  editor = new $.fn.dataTable.Editor( {
        ajax: "controllers/compras.php",
        table: "#tablaCompras",
        fields: [ {
                label: "Clasificacion:",
                name: "Clasificacion"
            },{
                label: "Id Proveedor:",
                name: "idProveedor"
            }, {
                label: "Proveedor:",
                name: "Proveedor"
            }, {
                label: "Fecha:",
                name: "Fecha",
                type: "datetime"
            }, {
                label: "No. Documento:",
                name: "No_documento"
            }, {
                label: "Documento Fiscal:",
                name: "Documento_fiscal"
            }, {
                label: "Sub total:",
                name: "Sub_Total",
            }, {
                label: "Importe excento:",
                name: "Importe_excento"
            }, {
                label: "15%ISV:",
                name: "15_Porciento"
            }, {
                label: "Total:",
                name: "Total"
            }, {
                label: "Concepto:",
                name: "Concepto"
            }, {
                label: "Saldo:",
                name: "Saldo"
            }, {
                label: "Id Forma de pago:",
                name: "IdFormadePago"
            }, {
                label: "Referencia:",
                name: "Referencia"
            }
        ]
    } );
 
    $('#tablaCompras').DataTable( {
        dom: "Bfrtip",
        ajax: "controllers/compras.php",
        columns: [
            { data: "Clasificacion" },
            { data: "idProveedor" },
            { data: "Proveedor" },
            { data: "Fecha" },
            { data: "No_documento" },
            { data: "Documento_fiscal" },
            { data: "Sub_Total", render: $.fn.dataTable.render.number( ',', '.', 0 ) },
            { data: "Importe_excento", render: $.fn.dataTable.render.number( ',', '.', 0 ) },
            { data: "15_Porciento", render: $.fn.dataTable.render.number( ',', '.', 0 ) },
            { data: "Total", render: $.fn.dataTable.render.number( ',', '.', 0 ) },
            { data: "Concepto"},
            { data: "Saldo", render: $.fn.dataTable.render.number( ',', '.', 0 ) },
            { data: "IdFormadePago"},
            { data: "Referencia" },
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );})
</script>
</body>
</html>

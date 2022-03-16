<!DOCTYPE html>
<html lang="es">

<head>
 <?php require_once("../../MainHead/mainhead.php"); ?>
  <title>Mantenimiento de Productos</title>
</head>

<body>

 <?php require_once("../../MainPanel/left_panel.php"); ?>
 <?php require_once("../../MainPanel/head_panel.php"); ?>
 <?php require_once("../../MainPanel/right_panel.php"); ?>

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="index.html">Mantenimiento</a>
        <span class="breadcrumb-item active">Producto</span>
      </nav>
    </div><!-- br-pageheader -->
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
      <h4 class="tx-gray-800 mg-b-5">Producto</h4>
      <p class="mg-b-0">Ventana para el Mantenimiento de los productos</p>
    </div>

    <div class="br-pagebody">

      <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Mantenimineto de producto</h6>

        <!--Boton que ejecuta el modalmantenimiento.php-->
        <button id="btnnuevo" class="btn btn-outline-primary btn-block mg-b-10">Nuevo Registro</button>

        <hr>
        <div class="table-wrapper">
        <table id="producto_data" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Nombre</th>
                    <th class="wd-15p">Descripción</th>
                    <th class="wd-15p"></th>
                    <th class="wd-20p"></th>
                  </tr>
                </thead>
                <tbody>
        
                </tbody>
              </table>
        </div>
    </div>
  </div>

  <?php require_once("../../MainJs/js.php"); ?>
  
   <!--Llamanado al modalmantenimiento-->
  <?php require_once("modalmantenimiento.php"); ?>
  <script type="text/javascript" src="mntproducto.js"></script>
</body>

</html>
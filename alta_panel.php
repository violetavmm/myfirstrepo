<?php session_start();

require_once("config/config.php"); 
include("php/funciones.php");
	
$queryLog="SELECT * FROM pt_session INNER JOIN pt_usuario ON pt_usuario.idUsuario=pt_session.idUsuario WHERE token = '$_SESSION[token]'";
$resultLog = mysqli_query ($conectar,$queryLog);
$rowLog = mysqli_fetch_assoc($resultLog);
if(mysqli_num_rows($resultLog)>0&&($rowLog["tipoUsuario"]=="ADMINISTRADOR"||$rowLog["tipoUsuario"]=="INGENIERIA") || $rowLog["tipoUsuario"] == "SUPERVISOR")
{ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyecto Terra - Terra-Link</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="img/Logo.ico">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Magnific Popup  -->
    <link rel="stylesheet" href="plugins/magnific-popup/magnific-popup.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
  <body class="hold-transition skin-blue sidebar-collapse sidebar-mini fixed">
    <!-- Site wrapper -->
    <div class="wrapper">

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <?php $linkRegresarHeader = "paneles.php"; ?>
      <?php include("header.php"); ?>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
		<div style="clear:both"></div>
        <section class="content-header">
        <br>
        </section>
		<div style="clear:both"></div>

        <!-- Main content -->
        <section class="content">
          <!-- COLOR PALETTE -->
          <div class="box box-default color-palette-box">
            <div class="box-header with-border">
              <img src="Botones/Prospectacion/Prospecto.png" width="60px">
              <span class="terra-titulo-naranja">Nuevo Panel</span>
            </div>
            <form id="form1" method="post" action="php/alta_panel.php" enctype="multipart/form-data">
            <div class="box-body">
              <div class="row">
                <div class="col-sm-12 col-md-3">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="panel">Codigo *</label>
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="codigo">
                      </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-5">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="panel">Nombre Panel *</label>
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="panel">
                      </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-4">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="capacidadPanel">Capacidad (W) *</label>
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="capacidadPanel">
                      </div>
                     </div>
                </div>
              </div><!-- /.row -->
              </div><!-- /.box-body -->
            <div class="box-body">
              <div class="row">
                <div class="col-sm-12 col-md-3">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="defaultPanel">¿Default para Renta?</label>
                      <div class="col-sm-9">
                          <select class="form-control select2" name="defaultPanel" style="width: 100%;">
                              <option value="NO">NO</option>
                              <!--<option value="SI">SI</option>-->
                       	 </select>
                      </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-3">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="defaultPanelVenta">¿Default para Venta?</label>
                      <div class="col-sm-9">
                          <select class="form-control select2" name="defaultPanelVenta" style="width: 100%;">
                              <option value="NO">NO</option>
                              <!--<option value="SI">SI</option>-->
                       	 </select>
                      </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-2">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="costoUSD">Costo W (USD)</label>
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="costoUSD">
                      </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-4">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="porcentajeEficienciaPanel">Eficiencia / Rendimiento del Panel (%)</label> <span style="font-size:10px;">(Porcentaje de eficiencia del panel. Ejemplo: 92%)</span>
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="porcentajeEficienciaPanel">
                      </div>
                     </div>
                </div>
              </div><!-- /.row -->
              </div><!-- /.box-body -->
            <div class="box-body">
              <div class="row">
                <div class="col-sm-12 col-md-4">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="ancho">Ancho (m) *</label>
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="ancho">
                      </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-4">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="largo">Largo (m) *</label>
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="largo">
                      </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-4">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="voc_real">Tensión de circuito abierto Voc (V) * </label> <span style="font-size:10px;"><!--(Porcentaje perdida de voltaje por cada grado de temperatura arriba de 25º)--></span>
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="voc_real">
                      </div>
                     </div>
                </div>
              </div><!-- /.row -->
              </div><!-- /.box-body -->
            <div class="box-body">
              <div class="row">
                <div class="col-sm-12 col-md-4">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="vr">Tensión a circuito cerrado (V) *</label> <span style="font-size:10px;"><!--( VR Voltaje Real del Panel)--></span>
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="vr">
                      </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-4">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="corriente">Amperaje a circuito cerrado (A) *</label> 
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="corriente">
                      </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-4">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="isc">Corriente a cortocircuito Isc (A) *</label> 
                      <div class="col-sm-9">
                      	<input class="form-control" style="height:50px;" type="text" value="" name="isc">
                      </div>
                     </div>
                </div>
              </div><!-- /.row -->
              </div><!-- /.box-body -->
              <div class="box-body">
              <div class="row">
              </div><!-- /.row -->
              </div><!-- /.box-body -->
              <div class="box-body">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="voc">Adjuntar Manual </label> 
                      <div class="col-sm-9">
                            <div class="fileupload btn btn-default">
                                <input type="file" class="upload" name="archivoManual">
                            </div> <small>(PDF o Imagen)</small>
                      </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-6">
                	<div class="form-group">
                      <label class="col-sm-3 control-label" for="voc">Adjuntar Ficha Técnica </label>
                      <div class="col-sm-9">
                            <div class="fileupload btn btn-default">
                                <input type="file" class="upload" name="archivoFicha">
                            </div> <small>(PDF o Imagen)</small>
                      </div>
                     </div>
                </div>
              </div><!-- /.row -->
              </div><!-- /.box-body -->
              <div class="box-body">
              <div class="row">
                <div class="col-sm-12 col-md-12">
                	<div class="form-group">
                      <label class="col-sm-1 control-label" for="observaciones">Observaciones </label>
                      <div class="col-sm-11">
                      	<textarea class="form-control" name="observaciones" ></textarea>
                      </div>
                     </div>
                </div>
              </div><!-- /.row -->
              </div><!-- /.box-body -->
			<div class="box-body">
              <div class="row">
                <div class="col-md-12" style="text-align:center;">
					<br><br><a onclick="guardarProspecto();" href="javascript:void(0)"><img src="Botones/Guardar.png" width="100px"></a><br>Guardar
                </div>
              </div><!-- /.row -->
            </div><!-- /.box-body -->
            </form>
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
      <?php include("footer.php"); ?>

    </div><!-- ./wrapper -->
    <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
    <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
        <h1>Datos incorrectos</h1>
        <p>Verifique que haya ingresado sus datos correctamente.</p>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Form -->
	<script src="plugins/form/jquery.form.js"></script>
    <!-- Validate Form -->
    <script src="plugins/validate/jquery.validate.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- Magnific Popup -->
	<script src="plugins/magnific-popup/jquery.magnific-popup.js"></script>
    <!-- Loader -->
	<script src="plugins/loader/loadingoverlay.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Are you sure you want to leave page -->
	<script src="plugins/areyousure/jquery.are-you-sure.js"></script>
    <script> 
		//Initialize Select2 Elements
		    $(".select2").select2({
			  placeholder: "Seleccionar..."
			});
		//Are you sure you want to leave page
		 $('form').areYouSure();
		//ENVIAR FORMULARIO
		function guardarProspecto(){
			$('#form1').submit();
		}
	
		$('#form1 input').keydown(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					$('#form1').submit();
				}
			});
		//VALIDAR
		$('#form1').validate({
			rules: {
			   'codigo': 'required',
			   'panel': 'required',
			   'capacidadpanel': 'required digits',
			   'costoUSD': 'required number',
			   'ancho': 'required number',
			   'largo': 'required number',
			   'voc_real': 'required number',
			   'vr': 'required number',
			   'corriente': 'required number',
			   'isc': 'required number',
			   'archivoManual': 'required',
			   'archivoFicha': 'required',
			   'porcentajeEficienciaPanel': 'required'
			   },
		   debug: true,
		   submitHandler: function(form){
				$.LoadingOverlay("show");
				form.submit();
			   
		   },
		   onfocusout: false
		});
		
	</script>
    <script>
	$('#form1 input[name=panel').keyup(function() {
		$(this).val($(this).val().toUpperCase());
	});
		
	var $eventSelect = $("#form1 select[name=defaultPanel]");
		$eventSelect.on("change", function () { 
			if($("#form1 select[name=defaultPanel]").val()=="SI")
			{
			  	$("#form1 select[name=defaultPanelVenta]").val("NO").trigger("change");
			}
		 });
	var $eventSelect2 = $("#form1 select[name=defaultPanelVenta]");
		$eventSelect2.on("change", function () { 
			if($("#form1 select[name=defaultPanelVenta]").val()=="SI")
			{
			  	$("#form1 select[name=defaultPanel").val("NO").trigger("change");
			}
		 });
		 
	</script>
    <script>
	<?php 
	if(isset($_GET["error"]))
	{ ?>
			$.LoadingOverlay("hide");
			$("#small-dialog").html("<h1>Error</h1><p><?php echo $_GET["error"]; ?></p>");
			$.magnificPopup.open({
			  items: {
				src: '#small-dialog'
			  },
			  type: 'inline'
			});
	<?php } ?>
	</script>
  </body>
</html>
<?php
}
else
{
	exit("<script>window.top.location.replace('index.php');</script>");
}
?>
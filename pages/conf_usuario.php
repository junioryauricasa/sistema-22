<?php
require_once("sistema/cabecera.php");
if ($_SESSION['config'] == 0) {
    header("location:index.php");
}

/* if (!isset($_GET['fact']) || !isset($_GET['prove'])) {
  header("location:factura_list.php");
  } else {
  $factura = $_GET['fact'];
  $prove = $_GET['prove'];
  } */
?>
<!DOCTYPE html>



    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Configuracion de Usuarios</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

        <!-- Open Sans font from Google CDN -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

        <!-- LanderApp's stylesheets -->
        <link href="../assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/stylesheets/landerapp.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/stylesheets/bootstrap-toggle.min.css" rel="stylesheet" type="text/css"/>
        <style>
            .dataTables_filter{
                text-align: right;
            }
            .dataTables_paginate{
                text-align: right;
            }
        </style>
        <!--[if lt IE 9]>
                <script src="assets/javascripts/ie.min.js"></script>
        <![endif]-->

    </head>


    <!-- 1. $BODY ======================================================================================
            
            Body
    
            Classes:
            * 'theme-{THEME NAME}'
            * 'right-to-left'      - Sets text direction to right-to-left
            * 'main-menu-right'    - Places the main menu on the right side
            * 'no-main-menu'       - Hides the main menu
            * 'main-navbar-fixed'  - Fixes the main navigation
            * 'main-menu-fixed'    - Fixes the main menu
            * 'main-menu-animated' - Animate main menu
    -->
    <body class="<?php echo $_SESSION['template'] ?> main-menu-animated main-navbar-fixed main-menu-fixed">

        <script>var init = [];</script>

        <div id="main-wrapper">

            <!-- 2. $MAIN_NAVIGATION ===========================================================================
            
                    Main navigation
            -->
            <?php
            require 'sistema/navbar.php';

            require 'sistema/menu.php';
            ?> <!-- / #main-menu -->
            <!-- /4. $MAIN_MENU -->


            <div id="content-wrapper">
                <ul class="breadcrumb breadcrumb-page">
                    <div class="breadcrumb-label text-light-gray" >Tu estas aqui: </div>
                    <li><a href="">Configuracion</a></li>
                    <li><a href="conf_usuario.php">Usuarios</a></li>
                    <!--                    <li class="active"><a href="#">Dashboard</a></li>-->
                </ul>
                <div class="page-header">
                    <div class="pull-left col-sm-4">
                        <h1><span class="text-light-gray">Configuracion / </span>Usuarios</h1> 
                    </div>
                </div> <!-- / .page-header -->

                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row"> 
                                    <div class="col-lg-8 col-sm-8" >
                                        <b id="subtitulo">Usuarios</b>
                                    </div>
                                    <div class="col-lg-2 col-sm-2" >
                                        <button type="button" onclick="abrirModalUsuario();" class="btn btn-success btn-block ">
                                            <span class="fa fa-plus-circle fa-fw "></span> 
                                        </button>
                                    </div>
                                    <div class="col-lg-2 col-sm-2" >
                                        <button type="button" onclick="reCargaUsuarios();" class="btn btn-default btn-block">
                                            <span class="fa  fa-refresh fa-fw "></span> 
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row"> 
                                    <div class="col-lg-12 table-primary table-responsive"> 
                                        <table id="listado_usuarios" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 5%;">usuario</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 10%;">nombre</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 10%;">perfil</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 10%;">detalle</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 10%;">estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>  
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- .panel-body -->
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row"> 
                                    <div class="col-lg-6 col-sm-6" >
                                        <b id="subtitulo">Perfiles</b>
                                    </div>
                                    <div class="col-lg-3 col-sm-3" >
                                        <button type="button" onclick="" class="btn btn-success btn-block">
                                            <span class="fa fa-plus-circle fa-fw "></span> 
                                        </button>
                                    </div>
                                    <div class="col-lg-3 col-sm-3" >
                                        <button type="button" onclick="reCargaPerfiles();" class="btn btn-default btn-block">
                                            <span class="fa  fa-refresh fa-fw "></span> 
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-primary">
                                    <table id="listado_perfiles" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 60%;">nombre</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 10%;">detalle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>  
                                    </table>
                                </div>
                            </div>
                            <!-- .panel-body -->
                        </div>
                    </div>
                </div> <!-- / #content-wrapper -->
                <div id="main-menu-bg"></div>
            </div> <!-- / #main-wrapper -->
            <?php
            require('modal/modal_addUsuario.php');
            require('modal/modal_usuarioEliminado.php');
            require('modal/modal_showUsuario.php');
            require('modal/modal_showRol.php');
            ?>


            <!-- Get jQuery from Google CDN -->
            <!--[if !IE]> -->
            <script type="text/javascript"> window.jQuery || document.write('<script src="../assets/javascripts/jquery.min.js">' + "<" + "/script>");</script>
            <!-- <![endif]-->
            <!--[if lte IE 9]>
                    <script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
            <![endif]-->


            <!-- LanderApp's javascripts -->
            <script src="../js/carga_base.js" ></script>
            <script src="../js/ajax/ajax_conf_usuario.js" ></script>
            <script src="../js/paginas/conf_usuario.js" ></script>
            <script src="../assets/javascripts/bootstrap.min.js"></script>
            <script src="../assets/javascripts/bootstrap-datepicker.min.js" ></script>
<!--            <script src="../js/dataTables.tableTools.js" ></script>-->
            <script src="../js/bootstrap-toggle.min.js"></script>
            <script src="../js/jquery.Rut.js"></script>
            <script src="../assets/javascripts/landerapp.min.js"></script>
            <script src="../js/dataTables.bootstrap.js" ></script>

            <script type="text/javascript">
                init.push(function () {
                    //$(":file").filestyle({buttonName: "btn-primary", buttonText: "Seleccionar Archivo"});
                });
                window.LanderApp.start(init);
            </script>

    </body>
</html>
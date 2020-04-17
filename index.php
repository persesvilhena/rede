
<?php
include "engine/conexao.php"; 
include "engine/protege.php";
include "engine/funcao_interna.php";

$server = $_SERVER['SERVER_NAME'];
$urldapag = $_SERVER['REQUEST_URI'];
$date = date("Y-m-d H:m:s");
if(isset($_GET['i1'])){$i1 = recebe($_GET['i1']);} else {$i1 = null;}
if(isset($_GET['i2'])){$i2 = recebe($_GET['i2']);} else {$i2 = null;}
if(isset($_GET['i3'])){$i3 = recebe($_GET['i3']);} else {$i3 = null;}
if(isset($_GET['i4'])){$i4 = recebe($_GET['i4']);} else {$i4 = null;}
if(isset($_GET['p1'])){$p1 = recebe($_GET['p1']);} else {$p1 = null;}
if(isset($_GET['p2'])){$p2 = recebe($_GET['p2']);} else {$p2 = null;}
if(isset($_GET['p3'])){$p3 = recebe($_GET['p3']);} else {$p3 = null;}
if(isset($_GET['p4'])){$p4 = recebe($_GET['p4']);} else {$p4 = null;}
if(isset($_GET['z1'])){$z1 = recebe($_GET['z1']);} else {$z1 = null;}
if(isset($_GET['z2'])){$z2 = recebe($_GET['z2']);} else {$z2 = null;}
if(isset($_GET['u'])){$u = recebe($_GET['u']);} else {$u = null;}
if(isset($_POST['eurl'])){$eurl = recebe($_POST['eurl']);} else {$eurl = null;}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="engine/imgs/icon.png">

    <title>Rede</title>
    <script src="engine/js/jquery.js" type="text/javascript"></script>
    <script src="engine/js/utils.js" type="text/javascript"></script>
    <script src="engine/js/ajax.js" type="text/javascript"></script>
    <script src="engine/js/script.js" type="text/javascript"></script>


    <!-- Bootstrap core CSS -->
    <link href="engine/dist/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="engine/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="engine/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="engine/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="engine/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php include "engine/barra_superior.php"; ?>

    <div class="container-fluid">
        <br>
      <div class="row">
        <div class="col-md-2">
            <?php include "engine/painel.php"; ?>
        </div>
        <div class="col-md-10">
          <?php 
            include "engine/com/cabeca.php";
            include "engine/redirect.php"; 
          ?>
        </div>
        <!--<div class="col-md-2"></div>-->
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="engine/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="engine/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="engine/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="engine/assets/js/ie10-viewport-bug-workaround.js"></script>


    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="conteudobox">

        </div>
      </div>
    </div>

  </body>
</html>

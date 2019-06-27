<?php 
define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= isset($title) ? $title : 'Billet simple pour l\'Alaska ' ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?= BASE_URL; ?>/Web/img/favicon.png" rel="icon">
  <link href="<?= BASE_URL; ?>/Web/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?= BASE_URL; ?>/Web/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?= BASE_URL; ?>/Web/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?= BASE_URL; ?>/Web/css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

</head>

<body>
 <!-- Static navbar ----------------------------------------------------------------->
 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Jean FORTEROCHE</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">

       
        <?= $content ?>
        <?php if ($user->hasFlash()) echo '<p id="message" style="text-align: center;color:red;">', $user->getFlash(), '</p>'; ?>
        <div id="social">
          <div class="container">
            <div class="row centered">
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-dribbble"></i></a>
              </div>
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-facebook"></i></a>
              </div>
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-twitter"></i></a>
              </div>
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </div>
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-instagram"></i></a>
              </div>
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-tumblr"></i></a>
              </div>

            </div>
          </div>
        </div>

        <div id="copyrights">
          <div class="container">
            <div class="credits"
            Created with Instant template by <a href="https://dev-alaa.fr">RedOne</a>
          </div>
        </div>
      </div>

      <!-- JavaScript Libraries -->
      <script src="<?= BASE_URL; ?>/Web/lib/jquery/jquery.min.js"></script>

      <script src="<?= BASE_URL; ?>/Web/lib/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?= BASE_URL; ?>/Web/lib/php-mail-form/validate.js"></script>
      <script src="<?= BASE_URL; ?>/Web/js/tinymce/jquery.tinymce.min.js"></script>
      <script src="<?= BASE_URL; ?>/Web/js/tinymce/tinymce.min.js"></script>


      <!-- Template Main Javascript File -->
      <script src="<?= BASE_URL; ?>/Web/js/main.js"></script>

    </body>
    </html>

<?php
  include 'core/init.php';
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Mana Fitness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; 
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js">
    </script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand">Mana Fitness</a>
        </div>
      </div>
    </div>

    <div class="container">
      <h1>Mana Fitness - Jawbone Connection</h1>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
      <!--First attempt at using fluid grid system-->
        <div class="span1">
      <!--Leave space for sidebar content-->
        </div>
      <div class="span10">
      <!--Descriptions or subheader space-->
      <br>
        <?php
            if(logged_in()===true){
              include 'jawform.php';
            }
           ?>
        </div>
      </div>
    </div>

  </body>
</html>
<?php
  //start session and have ability to use functions defined
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
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
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
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="Home.php"> Home </a></li>
                <li><a href="Register.php"> Register </a></li>
  				<li><a href="Login.php"> Login </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <h1>Mana Fitness Web Page</h1>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
      <!--First attempt at using fluid grid system-->
        <div class="span1">
      <!--Leave space for sidebar content-->
        </div>
      <div class="span11">
      <!--Descriptions or subheader space-->
      <br>
      <div class="media">
        <a class="pull-left">
          <img id="temp" src="temp.jpg" class="img-circle" alt="">
        </a>
        <div class="media-body">
          <h4 class="media-heading"> Welcome! </h4>
            <br>
            <p> This is the temporary site we're using to build out Mana Fitness!</p>
            <br>

            <p>Here are some interesting things to check out:<p>
              <div class="row-fluid">
                <div class="span5">
                </div>
                <div class="span5">
                </div>
              </div>
              <br>
              <div class="row-fluid">
                <div class="span10">
                  <button type="button" onclick="location.href='Test.php'"> CLICK HERE!!</button>
                </div>
              </div>
        </div>
      </div>
        </div>
      </div>
    </div>

  </body>
</html>
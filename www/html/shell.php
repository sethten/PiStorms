<?php
/*
# Copyright (c) 2016 mindsensors.com
# 
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License version 2 as
# published by the Free Software Foundation.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.    See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
#
#mindsensors.com invests time and resources providing this open source code, 
#please support mindsensors.com  by purchasing products from mindsensors.com!
#Learn more product option visit us @  http://www.mindsensors.com/
#
# History:
# Date         Author          Comments
# May 2017     Seth Tenembaum  Initial Authoring
*/

include "api/config.php";

?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="theme-color" content="#DD4B39">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SSH | PiStorms Web Interface</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bootstrap.min.css">  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/font-awesome.min.css">
  <link rel="stylesheet" href="assets/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/pnotify.min.css">
  <link rel="stylesheet" href="assets/skin-red.min.css">
  <link rel="stylesheet" href="assets/slider.css">
  <style>
    iframe {
        width: 100%;
        height: 100%;
    }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="./" class="logo">
      <span class="logo-mini"><b>PS</b></span>
      <span class="logo-lg"><b>PiStorms</b> Web</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>
  </header>

  <?php
    include_once("./components/nav.php");
  ?>

  <div class="content-wrapper">
    <section class="content">

      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Secure SHell</h3>
            </div>
            <div class="box-footer">
              <iframe src="https://PiStorms01:4200">
              </iframe>
            </div>
          </div>
        </div>
        
        
      </div>

    </section>
  </div>

<?php include_once("./components/footer.php"); ?>

</div>

<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/app.min.js"></script>
<script type="text/javascript" src="assets/pnotify.min.js"></script>
<script type="text/javascript" src="assets/jquery.slimscroll.min.js"></script>

<script>
PNotify.prototype.options.styling = "bootstrap3";
PNotify.prototype.options.delay = 3000;

function notify(tt,tx,tp) {
    new PNotify({
        title: tt,
        text: tx,
        type: tp,
        icon: false
    });
}
</script>

<script>
function set_iframe_height() {
    const h = (selector) => $(selector).height();
    $("iframe").height(h(window)-h(".main-footer")-h(".main-header")-154);
    if ($(".content-wrapper").css("min-height") == "514px")
        $("iframe").height(h(window)-h(".main-header")-104);
}
$(window).load(  set_iframe_height);
$(window).resize(set_iframe_height);
</script>

</body>
</html>

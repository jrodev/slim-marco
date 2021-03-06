<!doctype html>
<html>

<head>
<link rel="shorcut icon" href="../images/oniees.ico">
<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<meta charset="utf-8">
<title>ONIEES - Observatorio Nacional de Infraestructura, Equipamiento y Mantenimiento de Establecimientos de Salud - Perú</title>
   <link rel="stylesheet" href="../css/styles.css">
   <link rel="stylesheet" type="text/css" href="../css/estilo.css">
   <link rel="stylesheet" type="text/css" href="../css/menu.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../js/script.js"></script>
</head>
<body>
<div id="principal">

<div id="header">

<?php

include("menu.php"); ?><br>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="myCarouselCustom" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarouselCustom" data-slide-to="0" class="active"></li>
        <li data-target="#myCarouselCustom" data-slide-to="1"></li>
        <li data-target="#myCarouselCustom" data-slide-to="2"></li>
        <li data-target="#myCarouselCustom" data-slide-to="3"></li>
        <li data-target="#myCarouselCustom" data-slide-to="4"></li>
        <li data-target="#myCarouselCustom" data-slide-to="5"></li>
        <li data-target="#myCarouselCustom" data-slide-to="6"></li>
        <li data-target="#myCarouselCustom" data-slide-to="7"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active" align="center">
            <img src="images/ejer_cito.jpg?v=hg56hg56hg56" alt="">
        </div>
        <div class="item" align="center">
            <img src="images/es_salud.jpg?v=hg56hg56hg56" alt="">
        </div>
        <div class="item" align="center">
            <img src="images/f_a_p.jpg?v=hg56hg56hg56" alt="">
        </div>
        <div class="item" align="center">
            <img src="images/min_sa.jpg?v=hg56hg56hg56" alt="">
        </div>
        <div class="item" align="center">
            <img src="images/na_val.jpg?v=hg56hg56hg56" alt="">
        </div>
        <div class="item" align="center">
            <img src="images/po_li_cia.jpg?v=hg56hg56hg56" alt="">
        </div>
        <div class="item" align="center">
            <img src="images/re_gio_nal.jpg?v=hg56hg56hg56" alt="">
        </div>
        <!--div class="item" align="center">
            <img src="../images/Hospital_Carlos_Segun.jpg" alt="">
        </div-->
    </div>

    <!-- Controls -->
    <!--<a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>-->
<!-- Custom Controls
<a href="javascript:void(0);" id="prevBtn">Prev Slide</a>
<a href="javascript:void(0);" id="nextBtn">Next Slide</a>

Código Javascript-->

<script type="text/javascript">
// Call carousel manually
$('#myCarouselCustom').carousel();

// Go to the previous item
$("#prevBtn").click(function(){
    $("#myCarouselCustom").carousel("prev");
});
// Go to the previous item
$("#nextBtn").click(function(){
    $("#myCarouselCustom").carousel("next");
});
</script>
<script type="text/javascript">
$('.carousel').carousel({
     interval: 8000,
     pause:true,
     wrap:false
});

</script>

<p>&nbsp;</p>
</div>
</body>
<p div="nombre7">El Observatorio Nacional de Infraestructura, Equipamiento de Establecimientos de Salud (ONIEES) es una herramienta de seguimiento de gesti&oacute;n sanitaria que establece un mecanismo de transparencia de las compras realizadas por las entidades del sector salud y seguimiento al cumplimiento de los planes multianuales de mantenimiento de la infraestructura y equipamiento de los establecimientos de salud a nivel nacional.</p>
<?php include("footer.php"); ?>
</html>

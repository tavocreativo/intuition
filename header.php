<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">

    <title>Intuition Studio - Desarrollo web</title>
    <?php wp_meta(); ?>
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.ico" type="">

    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url');  ?>/style.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url');  ?>/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url');  ?>/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url');  ?>/css/animate.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/custom.min.css?=v2" />


    <?php wp_head(); ?>
</head>

<body>
    <header class="header" id="header">
        <!--header-start-->

        <article>
            <figure class="cloud">
            </figure>
            <figure class="cloud2">
            </figure>
            <figure class="cloud3">
            </figure>
            <figure class="cloud4">
            </figure>
        </article>

        <div class="container px-4">
            <figure class="logo animated fadeInDown delay-07s">
                <a href="#"><img src="<?php bloginfo('template_url') ?>/img/logo-01.svg" alt=""></a>
            </figure>
            <h1 class="animated fadeInDown delay-07s">Bienvenidos a Intuition Studio</h1>
            <ul class="we-create animated fadeInUp delay-1s">
                <li>Somos una agencia digital especializada en transformar expectativas en realidades.</li>
            </ul>
            <a class="link animated fadeInUp delay-1s servicelink" href="#Portfolio">Empecemos</a>
        </div>
    </header>
    <!--header-end-->

    <nav class="main-nav-outer" id="test">
        <!--main-nav-start-->
        <div class="container">
            <ul class="main-nav">
                <li><a href="#header">Home</a></li>
                <!-- <li><a href="#service">Servicios</a></li> -->
                <li><a href="#Portfolio">Portfolio</a></li>
                <li class="small-logo"><a href="#header"><img src="<?php bloginfo('template_url') ?>/img/small_logo.svg" alt=""></a></li>
                <li><a href="#soluciones">Soluciones</a></li>
                <!-- <li><a href="#team">Equipo</a></li>
 -->
                <li><a href="#contact">Contacto</a></li>
            </ul>
            <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
        </div>
    </nav>
    <!--main-nav-end-->
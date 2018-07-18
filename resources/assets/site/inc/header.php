<?php $GLOBALS['page'] = basename($_SERVER['SCRIPT_NAME']); ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Konjac Massa MF</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="shortcut icon" href="public/img/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="public/img/apple-touch-icon-precomposed.png">
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">Você está utilizando um navegador <strong>desatualizado</strong>. Favor <a href="https://browsehappy.com/?locale=pt-br">atualizar seu navegador</a> para melhorar sua experiência.</p>
    <![endif]-->
    
<!-- principal -->
<div id="principal">
    <!-- topo -->
    <header id="topo" class="container">
        <div class="">
            <!-- midias -->
            <ul class="midias nav align-items-center justify-content-end">
              <li class="nav-item d-none d-lg-flex">Nossas redes</li>
              <li class="nav-item">
                <a class="nav-link active" href="#"><i class="ico-face"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#"><i class="ico-twitter"></i></a>
              </li>
            </ul>
            <!-- menu -->
            <nav class="menu navbar navbar-expand-sm px-0">
                <?php if ($page == "index.php") { ?>
                <h1 class="navbar-brand"><a href="index.php" class="logo-konjac" title="Konjac Massa MF">Konjac Massa MF</a></h1>
                <?php } else { ?>
                <h2 class="navbar-brand"><a href="index.php" class="logo-konjac" title="Konjac Massa MF">Konjac Massa MF</a></h2>
                <?php } ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- ico menu mobile -->
                    <div class="ico-menu d-sm-none">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="produtos.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="sobre.php">Sobre a Konjac</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="faq.php">Faq</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="depoimentos.php">Demoimentos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="contato.php">Contato</a>
                        </li>
                    </ul>

                    <div class="bts-admin my-2 my-lg-0">
                        <a href="sacola.php" class="btn btn-roxo btn-sacola" title=""><i class="ico-bolsa"></i> Sacola vazia</a>
                        <a href="" class="btn btn-roxo" title=""><i class="ico-pessoa"></i> Minha Conta</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- //menu -->

    </header>
    <!-- //topo -->

    <!-- conteudo -->
    <main>
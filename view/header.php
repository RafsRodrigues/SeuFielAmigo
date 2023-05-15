<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Encontre seu amigo - Seu Fiel Amigo</title>
  <link rel="stylesheet" href="css/style.css" />
  <!-- <link href="bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->



</head>

<body>
  <header>
    <?php
    if ($_SESSION) { ?>
      <input hidden class="numIdUser" type="text" value="<?php echo $_SESSION['id']; ?>">
      <input hidden class="strPerfil" type="text" value="<?php echo $_SESSION['perfil']; ?>">
      <input hidden class="strEmailUser" type="text" value="<?php echo $_SESSION['email']; ?>">
    <?php } ?>

    <nav>
      <a class="logo" href="/seufielamigo/view/index.php"> <img src="img/simbolo2.png" style="width: 220px; margin-top:25px;" alt=""></a>
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <!-- <li><i class="uil uil-search"></i><a href="#">Buscar</a></li> -->
        <li><a style="color:rgb(65, 105, 225); font-weight: bold;" href="anunciar.php">Anunciar</a></li>
        <li><img src="img/bone2.png" style="width:25px;" alt=""></li>
        <?php if ($id == "") { ?>
          <li><a class="linkEntrar" href="login.php">Entrar</a></li>
        <?php } else { ?>
          <li><a style="color:rgb(65, 105, 225);" href="cadastros.php"><span class="login_infos"><?php echo $nome; ?></span></a></li>
          <li><a class="linkSair" href="logout.php"><i class="uil uil-signout"></i>Sair</a></li>
        <?php } ?>
      </ul>
    </nav>
  </header>
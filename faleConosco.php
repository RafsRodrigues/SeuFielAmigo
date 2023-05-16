<?php

if (!isset($_SESSION)) {
  session_start();
}

$id = "";
$nome = "";
if ($_SESSION) {
  if ($_SESSION['id']) {
    $id = $_SESSION['id'];
  } else {
    $id = "";
  }

  if ($_SESSION['nome']) {
    $nome = $_SESSION['nome'];
  } else {
    $nome = "";
  }
}
?>

<?php require_once('header.php'); ?>

<main>

  <div id="div_cadastroPetsConsulta">

    <div id="div_petsConsulta">

      <center>Entre em contato através do e-mail: seufielamigooficial@gmail.com</center>

    </div>

  </div>

</main>

<?php require_once('footer.php'); ?>
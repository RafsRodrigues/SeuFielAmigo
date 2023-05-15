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

      <center>O site <i>Seu Fiel Amigo</i> oferece uma solução simples e sem custos para ajudar pessoas de todo o território nacional a encontrar e publicar novos pets.<br> Lembre-se: publicando, você estará ajudando um animalzinho a encontrar um lar.</center>

    </div>

  </div>

</main>



<?php require_once('footer.php'); ?>
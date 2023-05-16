<?php

include('protect.php');

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

        <h2 style="color: rgb(65, 105, 225);">
          <center>Meus pets</center>
        </h2><br>
        <div id="mensagemAnalise"></div>

        <div id="listAnuncios" style="width: 100%;"></div>

      </div>

    </div>

   

  </main>


 
  <?php require_once('footer.php'); ?>
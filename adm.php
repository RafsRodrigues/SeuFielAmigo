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

  <div id="div_cadastroPetsAnuncios">
    <div class="busca-col-pesquisa">
      <button id="verAnuncios"> Anúncios</button>
    </div>
    <div class="busca-col-pesquisa">
      <button id="verUsuarios"> Usuários</button>
    </div>


    <div id="div_petsConsulta" class="anunciosHidden" style="display:none">

      <h2 style="color: rgb(65, 105, 225);">
        <center>Anúncios</center>
      </h2><br>

      <select name="select" class="input" id="strPedidos">
        <option value="" selected>Todos</option>
        <option value="S">Deferidos</option>
        <option value="N">Indeferidos</option>
        <option value="A">Pendente de análise</option>
      </select>

      <div id="listAnunciosGlobal" style=" overflow-x: auto;width:93%"></div>

    </div>

    <div id="div_petsConsulta" class="usuariosHidden" style="display:none">

      <h2 style="color: rgb(65, 105, 225);">
        <center>Usuários</center>
      </h2><br>

      <div id="listUsuariosGlobal" style=" overflow-x: auto;width:93%"></div>

    </div>

  </div>


</main>



<?php require_once('footer.php'); ?>
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

  <div id="div_pesquisa">

    <div class="buscador">
      <div id="divCat">
        <img src="img/cat22.png" id="imgCat">
      </div>
      <div class="row">
        <div class="busca-col">
          <select name="select" class="input" id="strEspecie">
            <option value="" selected>Todas as espécies</option>
            <option value="Cachorro">Cachorro</option>
            <option value="Gato">Gato</option>
          </select>
        </div>
        <div class="busca-col">
          <select name="select" class="input" id="strPorte">
            <option value="" selected>Todos os portes</option>
            <option value="Pequeno">Pequeno</option>
            <option value="Medio">Medio</option>
            <option value="Grande">Grande</option>
          </select>
        </div>
        <div class="busca-col">
          <select name="select" class="input" id="strSexo">
            <option value="" selected>Todos os sexos</option>
            <option value="Femea">Fêmea</option>
            <option value="Macho">Macho</option>
          </select>
        </div>
        <div class="busca-col">
          <select name="select" class="input strEstado" id="strEstadoPesquisa">
            <option value="" selected>Todos os estados</option>
          </select>
        </div>
        <div class="busca-col">
          <select name="select" class="input strBairro" id="strBairroPesquisa">
            <option value="" selected>Todas os bairros</option>
          </select>
        </div>
        <div class="busca-col-pesquisa">
          <button id="btnPesquisar"> Buscar</button>
        </div>
      </div>
    </div>

  </div>

  <main>

    <div id="div_anuncios"></div>

  </main>


  <?php require_once('footer.php'); ?>
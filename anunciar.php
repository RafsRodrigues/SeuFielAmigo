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

  <div id="div_cadastroPets">
    <div id="div_cadastro">
      <h2>
        <center>Quais as informações do animal?</center>
      </h2>
      <br>
      <label for="">Título:<span style="color:red">*</span></label><br>
      <input class="strTitulo customInput obrigatorio" type="text" id="strTitulo">
      <br>
      <label for="">Espécie: <span style="color:red">*</span></label><br>
      <select name="select" class="customInput obrigatorio" id="strEspecie">
        <option value="" selected>Todas as espécies</option>
        <option value="Cachorro">Cachorro</option>
        <option value="Gato">Gato</option>
      </select>
      <br>
      <label for="">Raça: <span style="color:red">*</span></label><br>
      <input class="strRaca customInput obrigatorio" type="text" id="strRaca">
      <br>
      <label for="">Idade:</label><br>
      <input class="strIdade customInput" type="number" id="strIdade">
      <br>
      <label for="">Sexo: <span style="color:red">*</span></label>
      <select name="select" class="customInput obrigatorio" id="strSexo">
        <option value="" selected>Todos os sexos</option>
        <option value="Femea">Fêmea</option>
        <option value="Macho">Macho</option>
      </select>
      <br>
      <label for="">Porte:</label>
      <select name="select" class="customInput" id="stPorte">
        <option value="" selected>Todos os portes</option>
        <option value="Pequeno">Pequeno</option>
        <option value="Medio">Medio</option>
        <option value="Grande">Grande</option>
      </select>
      <br>
      <label for="">Tel. para contato:</label><br>
      <input class="strTel customInput" type="text" id="telefone" placeholder="Digite um número de telefone" maxlength="15"> 
      <br>
      <label for="">Localização: <span style="color:red">*</span></label><br>

      <select name="select" class="input obrigatorio strEstado" id="strEstado">
        <option value="" selected>Todos os estados</option>
      </select>
      <select name="select" class="input obrigatorio strBairro" id="strBairro">
        <option value="" selected>Todas os bairros</option>
      </select>
      <br>
      <label for="">Descrição:</label><br>
      <textarea class="strDescricao " id="strDescricao" name="" id="" cols="74" rows="20"></textarea>
      <br>
      <form method="post" enctype="multipart/form-data">
        <label for="">Foto:</label>
        <br>
        <input type="file" id="file" accept="image/jpeg" class="btn btn-success" />
        <br>
      </form>
      <button id="enviaAnuncio"><i class="uil uil-message"></i>Enviar</button>
    </div>
  </div>

</main>



<?php require_once('footer.php'); ?>
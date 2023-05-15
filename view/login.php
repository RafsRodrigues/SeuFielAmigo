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

    <div id="div_login">
      <div class="div_entrar">
        <div style="color:white">ENTRAR</div>
        <br>
        <span>E-Mail: </span><br>
        <input class="strEmailLogin inputLogin obrigatorioL" type="text">
        <span>Senha: </span><br>
        <input class="strSenhaLogin inputLogin obrigatorioL" type="password">
        <br>
        <br>
        <button id="btnEntrarConta">ENTRAR</button>
      </div>
      <div class="div_cadastrar">
        <div style="color:white">CADASTRAR</div>
        <br>
        <span>Nome: <span style="color:red">*</span> </span><br>
        <input class="strNomeCadas inputLogin obrigatorioC" type="text">
        <span>E-Mail: <span style="color:red">*</span> </span><br>
        <input class="strEmailCadas inputLogin obrigatorioC" type="text">
        <span>Senha: <span style="color:red">*</span> </span><br>
        <input class="strSenhaCadas inputLogin obrigatorioC" type="password">
        <span>Repetir Senha: <span style="color:red">*</span> </span><br>
        <input class="strRSenhaCadas inputLogin obrigatorioC" type="password">
        <br>
        <span style="color:red;font-size:12px">* campos obrigatórios</span>
        <br>
        <br>
        <button id="btnCadastrarConta">CADASTRAR</button>
      </div>
    </div>

  </main>


  <?php require_once('footer.php'); ?>
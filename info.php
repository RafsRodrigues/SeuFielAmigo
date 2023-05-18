<?php
require_once("connection/conexao.php");
$cn = new ConnectionFactory();
$pdo = $cn->getConnect_seuFielAmigo();

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
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


$sql = "SELECT cp.numIdUser, numIdPet, strDescricao, strRaca, strIdade, strSexo, strPorte, strEstado, strBairro, DATE_FORMAT(cp.dtLog,'%d/%m/%Y') as dtLog, strEspecie,
strTel, strImagem, strAprovacao, Nome, strEmail,strTitulo FROM cadastro_pet cp 
left join cadastro_user cu on cu.numIdUser = cp.numIdUser 
left join bairro b on b.Codigo = cp.strBairro
where numIdPet = " . $_GET['id'];

$stmt = $pdo->query($sql);

$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<?php require_once('header.php'); ?>

<div class="div_link_back">
  <a class="link_back" href="index.php"><i class="uil uil-arrow-left"></i>Voltar</a>
</div>
<br>

<?php foreach ($rs as $obj) {
 $caminhoFoto = "./fotos/" . $obj['strImagem'];
 
?>

  <div class="box">

    <div id="div_infoPet">
      <img class="foto_pet_info" src="<?php echo $caminhoFoto; ?>" alt="">
      <div class="more_infos_pet"><br>
        <div class="infos_pet_title"><span><?php echo $obj['strTitulo']; ?></span></div>
        <div class="infos_pet_descrition">
          <span><i class="uil uil-angle-right-b"></i> Descrição</span>
          <div class="pet_descrition"><?php echo $obj['strDescricao']; ?></div>
        </div>
        <div class="infos_pet_features">
          <span><i class="uil uil-angle-right-b"></i> Características</span>
          <div class="infos_pet_itens"><span>Raça: <?php echo $obj['strRaca']; ?></span></div>
          <div class="infos_pet_itens"><span>Idade: <?php echo $obj['strIdade']; ?></span></div>
          <div class="infos_pet_itens"><span>Sexo: <?php echo $obj['strSexo']; ?></span></div>
          <div class="infos_pet_itens"><span>Porte: <?php echo $obj['strPorte']; ?></span></div>
        </div>

        <div class="infos_pet_locatization">
          <span><i class="uil uil-location-point"></i> Localização</span><br>
          <span style="color:black;font-size:15px;"><?php echo $obj['strEstado'].' - '.$obj['Nome']; ?></span>
        </div>

        <div class="infos_pet_locatization">
          <span><i class="uil uil-phone"></i> Contato:</span><br>
          <span style="color:black;font-size:15px;"><?php echo $obj['strTel'].' - '.$obj['strEmail']; ?></span>
        </div>

        <div class="infos_pet_clock">
          <span><i class="uil uil-clock"></i> Publicado em:</span>
          <span style="color:black;font-size:15px"><?php echo $obj['dtLog']; ?></span>
        </div>
  
      </div>
    </div>

  </div>

  <!-- <div class="box_contact" style="display:none;">
    <div class="contact_title">ENTRE EM CONTATO</div>
    <p class="user_name_publication"><?php echo $obj['strNome']; ?></p>
    <span>E-Mail: </span><br>
    <input style="cursor:not-allowed" class="strEmailContact" type="text" disabled value="<?php echo $obj['strEmail']; ?>">
    <br>
    <span>Mensagem:</span><br>
    <textarea class="strTextContact" name="story" rows="10"></textarea>
    <br>
    <button class="send_contact"><i class="uil uil-message"></i>Enviar</button>
  </div> -->

<?php } ?>

<?php require_once('footer.php'); 



?>
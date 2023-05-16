<?php
$obj = $_POST["obj"];
$itens = json_decode($obj);

?>
<option value="" selected>Todos os estados</option>
<?php foreach ($itens as $i) { ?>
	<option value="<?php echo $i->Uf; ?>"> <?php echo $i->Nome; ?></option>
<?php } ?>
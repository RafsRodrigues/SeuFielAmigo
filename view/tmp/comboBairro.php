<?php
$obj = $_POST["obj"];
$itens = json_decode($obj);

?>
<option value="" selected>Todos os bairros</option>
<?php foreach ($itens as $i) { ?>
	<option value="<?php echo $i->Codigo; ?>"> <?php echo $i->Nome; ?></option>
<?php } ?>
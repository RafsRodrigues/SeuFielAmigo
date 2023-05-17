<?php
extract($_POST);
$list = json_decode($obj);
session_start();


?>


<?php foreach ($list as $obj) {

    $caminhoFoto = "./fotos/" . $obj->strImagem;

    $classGenero = "";
    $iconGereno = "";

    if($obj->strSexo == "Macho"){
        $classGenero = "animal_titulo";
        $iconGereno = "uil-mars";
    }else{
        $classGenero = "animal_name_female";
        $iconGereno = "uil-venus";
    }

?>
    <div class="animal_card">
        <div class="div_foto_animal_card">
            <a href="./info.php?id=<?php echo $obj->numIdPet; ?>"><img class="foto_animal_card" src="<?php echo $caminhoFoto; ?>" alt=""></a>
            <span class="<?php echo $classGenero; ?>"><?php echo $obj->strTitulo; ?></span>
            <br>
            <span class="animal_sex"><i class="uil <?php echo $iconGereno; ?> iconSex"></i></span>
            <br>
        </div>
    </div>

<?php } ?>


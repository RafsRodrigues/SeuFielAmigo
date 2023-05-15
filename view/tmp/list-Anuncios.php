<?php
extract($_POST);
$list = json_decode($obj);
//echo $obj;
session_start();

?>


<table width="100%" style="overflow-x:scroll">
    <thead>
        <tr style=" background-color: #96abf0; color:white">
            <th></th>
            <th>
                <center>Título</center>
            </th>
            <th>
                <center>Espécie</center>
            </th>
            <th>
                <center>Ações</center>
            </th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($list as $obj) {

            if($obj->strAprovacao == null){
                exit();
            }

            $caminhoFoto = "./fotos/" . $obj->strImagem;

        ?>
            <tr>
                <td width="10%">
                    <img width="100%" src="<?php echo $caminhoFoto; ?>" alt="">
                </td>
                <td width="60%">
                    <center><?php echo $obj->strTitulo; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo $obj->strEspecie; ?></center>
                </td>
                <!-- <td width="2%">
                    <center><button type="button" class="btn-editar" style=" transition-duration: 0.4s;cursor:pointer; background-color: #4CAF50; color: white;border:1px solid green;" title="Editar" identificador='<?php echo "[".json_encode($obj)."]"; ?>'><i class="uil uil-edit"></i></button></center>
                </td> -->
                <td width="2%">
                    <center><button type="button" class="btn-excluir" style=" transition-duration: 0.4s;cursor:pointer; background-color: red; color: white;border:1px solid red;" title="Excluir" identificador='<?php echo $obj->numIdPet; ?>'><i class="uil uil-trash-alt"></i></button></center>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>
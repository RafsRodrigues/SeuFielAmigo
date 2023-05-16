<?php
extract($_POST);
$list = json_decode($obj);
//echo $obj;
session_start();

?>


<table>
    <thead>
        <tr style=" background-color: #96abf0; color:white">
            <th></th>
            <th>
                <center>Usuário ID</center>
            </th>
            <th>
                <center>Título</center>
            </th>
            <th>
                <center>Descrição</center>
            </th>
            <th>
                <center>Raça</center>
            </th>
            <th>
                <center>Espécie</center>
            </th>
            <th>
                <center>Idade</center>
            </th>
            <th>
                <center>Sexo</center>
            </th>
            <th>
                <center>Estado</center>
            </th>
            <th>
                <center>Data</center>
            </th>
            <th colspan="2">
                <center>Ações</center>
            </th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($list as $obj) {

            $caminhoFoto = "./fotos/" . $obj->strImagem;

          
           

        ?>
            <tr>
                <td width="10%">
                    <img width="100%" src="<?php echo $caminhoFoto; ?>" alt="">
                </td>
                <td width="5%">
                    <center><?php echo $obj->numIdUser; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo $obj->strTitulo; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo $obj->strDescricao; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo $obj->strRaca; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo $obj->strEspecie; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo $obj->strIdade; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo $obj->strSexo; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo $obj->strEstado; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo date_format(new DateTime($obj->dtLog), 'd/m/Y'); ?></center>
                </td>
                <td width="4%">
                    <center><button style="color:white; background-color:green;border:none;padding:5px;cursor:pointer" type="button" class="btn-aprovar" title="Aprovar" identificador='<?php echo $obj->numIdPet; ?>'><i class="uil uil-check"></i></button></center>
                </td>
                <td width="4%">
                    <center><button  style="color:white; background-color:red;border:none;padding:5px;cursor:pointer" type="button" class="btn-reprovar"title="Reprovar" identificador='<?php echo $obj->numIdPet; ?>'><i class="uil uil-times"></i></button></center>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>
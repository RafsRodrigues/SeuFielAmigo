<?php
extract($_POST);
$list = json_decode($obj);
//echo $obj;
session_start();

?>


<table>
    <thead>
        <tr style=" background-color: #96abf0; color:white">

            <th>
                <center>Usuário ID</center>
            </th>
            <th>
                <center>Nome</center>
            </th>
            <th>
                <center>E-mail</center>
            </th>
            <th>
                <center>Data de Registro</center>
            </th>
            <th>
                <center>Perfil</center>
            </th>
            <th>
                <center>Desativar</center>
            </th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($list as $obj) {

            $perfilAdm = "";
            $perfilUsu = "";

            if($obj->strPerfil == "Administrador"){
                $perfilAdm = "selected";
            }else if ($obj->strPerfil == "Usuario"){
                $perfilUsu = "selected";
            }

        ?>
            <tr>

                <td width="10%">
                    <center><?php echo $obj->numIdUser; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo $obj->strNome; ?></center>
                </td>
                <td width="10%">
                    <center><?php echo $obj->strEmail; ?></center>
                </td>

                <td width="10%">
                    <center><?php echo date_format(new DateTime($obj->dtLog), 'd/m/Y'); ?></center>
                </td>
                <td width="10%">
                    <center><select ident="<?php echo $obj->numIdUser; ?>" id="strSelectPerfil"  name="select" class="input" >
                            <option value="Usuario" <?php echo $perfilUsu; ?>>Usuario</option>
                            <option value="Administrador" <?php echo $perfilAdm; ?>>Administrador</option>
                        </select></center>
                </td>

                <td width="4%">
                    <center><button style="color:white; background-color:red;border:none;padding:5px;cursor:pointer" type="button" class="btn-desativarUser" identificador='<?php echo $obj->numIdUser; ?>'><i class="uil uil-times"></i></button></center>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>
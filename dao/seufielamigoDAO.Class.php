<?php

session_start();


require_once("../connection/conexao.php");

class consultaDAO
{

    private $pdo;

    public function __construct()
    {

        $cn = new ConnectionFactory();
        $this->pdo = $cn->getConnect_seuFielAmigo();
    }

    public function carregaEstado()
    {

        try {
            $sql = "SELECT * from estado order by Nome, Uf asc";

          

            $stmt = $this->pdo->query($sql);

            $rs = $stmt->fetchAll(PDO::FETCH_OBJ);

            return $rs;
        } catch (PDOException $erro) {

            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }

    public function carregaBairro($uf)
    {

        try {

            if ($uf != "") {
                $filter = " and Uf = '" . $uf . "'";
            }
            $sql = "SELECT * from bairro where Id is not null $filter order by Nome, Uf asc";

            $stmt = $this->pdo->query($sql);

            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rs;
        } catch (PDOException $erro) {

            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }


    public function cadastrarLogin($nome, $email, $senha)
    {
        try {


            $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO cadastro_user (strNome,strEmail, strSenha, dtLog, strPerfil) values ('$nome','$email','$senhaCrip',now(), 'Usuario')";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return true;
        } catch (PDOException $erro) {
            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }

    public function excluirPet($numIdPet)
    {
        try {


            $sql = "DELETE from cadastro_pet where numIdPet = $numIdPet";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return true;
        } catch (PDOException $erro) {
            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }

    public function desativarUser($numIdUser)
    {
        try {


            $sql = "DELETE from cadastro_user where numIdUser = $numIdUser";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return true;
        } catch (PDOException $erro) {
            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }


    public function login($email, $senha)
    {
        try {

            $sql = "select * from cadastro_user where strEmail = ? LIMIT 1";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->execute();

            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($usuario) {
                if (password_verify($senha, $usuario[0]['strSenha'])) {
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    $_SESSION['id'] = $usuario[0]['numIdUser'];
                    $_SESSION['nome'] = $usuario[0]['strNome'];
                    $_SESSION['email'] = $usuario[0]['strEmail'];
                    $_SESSION['perfil'] = $usuario[0]['strPerfil'];
                    return true;
                } else {
                    return "Falha ao logar! E-mail ou senha incorretos.";
                }
            } else {
                return "E-mail não existe!";
            }
        } catch (PDOException $erro) {
            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }

    public function salvaAnuncio($strTitulo, $strEspecie, $strRaca, $strIdade, $strSexo, $stPorte, $strEstado, $strBairro, $strDescricao, $strImagem, $telefone)
    {
        try {


            $id = $_SESSION['id'];


            $sql = "INSERT INTO cadastro_pet (strTitulo,strEspecie, strRaca, strIdade, strSexo, strPorte, strEstado, strBairro, strDescricao,strImagem, dtLog, numIdUser, strTel) values ('$strTitulo','$strEspecie','$strRaca','$strIdade','$strSexo','$stPorte','$strEstado','$strBairro','$strDescricao','$strImagem',now(),$id,'$telefone')";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return true;
        } catch (PDOException $erro) {
            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }

    public function pesquisarAnuncios($numIdUser)
    {

        try {
            $sql = "SELECT * from cadastro_pet where (strAprovacao = 'S' or strAprovacao is null) and numIdUser = " . $numIdUser;

            $stmt = $this->pdo->query($sql);

            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rs;
        } catch (PDOException $erro) {

            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }

    
    public function preencheUsuariosAdm()
    {

        try {
            $sql = "SELECT numIdUser, strNome, strEmail, dtLog, strPerfil from cadastro_user order by numIdUser desc";

            $stmt = $this->pdo->query($sql);

            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rs;
        } catch (PDOException $erro) {

            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }

    public function pesquisarAnunciosAdm($filtro)
    {

        try {

            $aprovacao = "";

            if($filtro == "S"){
                $aprovacao = " and strAprovacao = 'S'";
            }

            if($filtro == "N"){
                $aprovacao = " and strAprovacao = 'N'";
            }
            if($filtro == "A"){

                $aprovacao = " and strAprovacao is null";
            }

            $sql = "SELECT * from cadastro_pet where numIdPet is not null $aprovacao order by numIdPet desc";

            $stmt = $this->pdo->query($sql);

            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rs;
        } catch (PDOException $erro) {

            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }


    public function aprovarPet($numIdPet)
    {
        try {


            $sql = "UPDATE cadastro_pet set strAprovacao = 'S' where numIdPet = $numIdPet";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return true;
        } catch (PDOException $erro) {
            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }

    public function reprovarPet($numIdPet)
    {
        try {


            $sql = "UPDATE cadastro_pet set strAprovacao = 'N' where numIdPet = $numIdPet";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return true;
        } catch (PDOException $erro) {
            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }

    public function anuncioPrincipal($especie, $porte, $sexo, $estado, $bairro)
    {

        try {
            $filtros = "";

            if($especie != ""){
                $filtros.= " and strEspecie = '$especie'";
            }
            if($porte != ""){
                $filtros.= " and strPorte = '$porte'";
            }
            if($sexo != ""){
                $filtros.= " and strSexo = '$sexo'";
            }
            if($estado != ""){
                $filtros.= " and strEstado = '$estado'";
            }
            if($bairro != ""){
                $filtros.= " and strBairro = '$bairro'";
            }



            $sql = "SELECT * from cadastro_pet where strAprovacao = 'S' $filtros";

            $stmt = $this->pdo->query($sql);

            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rs;
        } catch (PDOException $erro) {

            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }

    public function enviaEmail($destinatario, $texto, $remetente)
    {
        try {

            $headers = "MIME-Version: 1.1\r\n";
            $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
            $headers .= "From: '$remetente'\r\n"; // remetente
            $headers .= "Return-Path: '$remetente'\r\n"; // return-path
            $envio = mail($destinatario, "Oba! Nova mensagem para o pet que você publicou.", $texto, $headers);

            if ($envio)
                return true;
            else
                echo "A mensagem não pode ser enviada";
        } catch (PDOException $erro) {

            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }


    public function editarPerfil($perfil, $id)
    {
        try {


            $sql = "UPDATE cadastro_user set strPerfil = '$perfil' where numIdUser = $id";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return true;
        } catch (PDOException $erro) {
            return $erro->getMessage() . " - " . $erro->getCode();
        }
    }
}

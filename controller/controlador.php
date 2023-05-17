<?php
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set('Europe/Lisbon');

extract($_POST);

require_once("../dao/seufielamigoDAO.Class.php");


switch ($action) {

	case "carregaEstado":

		try {
			$dao = new consultaDAO();
			$rs = $dao->carregaEstado();


			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				header("HTTP/1.0 500 Internal Server Error");
				//echo $rs;
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;

	case "carregaBairro":

		try {
			$dao = new consultaDAO();
			$rs = $dao->carregaBairro($uf);

			echo json_encode($rs);
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;


	case "cadastrarLogin":
		try {
			$dao = new consultaDAO();

			$rs = $dao->cadastrarLogin($nome, $email, $senha);

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				header("HTTP/1.0 500 Internal Server Error");
				//echo $rs;
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;


	case "excluirPet":
		try {
			$dao = new consultaDAO();

			$rs = $dao->excluirPet($numIdPet);

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				header("HTTP/1.0 500 Internal Server Error");
				//echo $rs;
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;

	case "login":
		try {
			$dao = new consultaDAO();

			$rs = $dao->login($email, $senha);

			if ($rs == 'true') {
				echo json_encode($rs);
			} else {
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;


	case "salvaAnuncio":
		try {
			$dao = new consultaDAO();

			$rs = $dao->salvaAnuncio($strTitulo, $strEspecie, $strRaca, $strIdade, $strSexo, $stPorte, $strEstado, $strBairro, $strDescricao, $strImagem, $telefone);

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				header("HTTP/1.0 500 Internal Server Error");
				//echo $rs;
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;

	case "pesquisarAnuncios":
		try {
			$dao = new consultaDAO();

			$rs = $dao->pesquisarAnuncios($numIdUser);

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;

	case "pesquisarAnunciosAdm":
		try {
			$dao = new consultaDAO();

			$rs = $dao->pesquisarAnunciosAdm($filtro);

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;

	case "preencheUsuariosAdm":
		try {
			$dao = new consultaDAO();

			$rs = $dao->preencheUsuariosAdm();

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;


	case "aprovarPet":
		try {
			$dao = new consultaDAO();

			$rs = $dao->aprovarPet($numIdPet);

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;

	case "reprovarPet":
		try {
			$dao = new consultaDAO();

			$rs = $dao->reprovarPet($numIdPet);

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;

	case "desativarUser":
		try {
			$dao = new consultaDAO();

			$rs = $dao->desativarUser($numIdUser);

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;

	case "anuncioPrincipal":
		try {
			$dao = new consultaDAO();

			$rs = $dao->anuncioPrincipal($especie, $porte, $sexo, $estado, $bairro);

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;

	case "enviaEmail":
		try {
			$dao = new consultaDAO();

			$rs = $dao->enviaEmail($destinatario, $texto, $remetente);

			echo $rs;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;

	case "editarPerfil":
		try {
			$dao = new consultaDAO();

			$rs = $dao->editarPerfil($perfil, $id);

			if (is_array($rs) || $rs == 'true' || $rs == '1') {
				echo json_encode($rs);
			} else {
				die('Tivemos o seguinte problema: ' . $rs);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
		break;
}

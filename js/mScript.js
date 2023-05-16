var controller = "controller/controlador.php";

$(function () {
  

  $(".linkAdm").hide();

  if ($(".strPerfil").val() == "Administrador") {
    $(".linkAdm").show();
    $(".linkAdm").html('<a href="adm.php">Área do Administrador</a>');
  }

  $(".anunciosHidden").show();

  anuncioPrincipal($("#strEspecie option:selected").val(), $("#strPorte option:selected").val(), $("#strSexo option:selected").val(), $("#strEstadoPesquisa option:selected").val(), $("#strBairroPesquisa option:selected").val());
  comboEstado();
  preencheAnuncios();
  preencheAnunciosAdm($("#strPedidos option:selected").val());
  preencheUsuariosAdm();

  $('#btnPesquisar').click(function () {
    anuncioPrincipal($("#strEspecie option:selected").val(), $("#strPorte option:selected").val(), $("#strSexo option:selected").val(), $("#strEstadoPesquisa option:selected").val(), $("#strBairroPesquisa option:selected").val());
  });

  $(".strEstado").change(function () {

    comboBairro($(".strEstado option:selected").val());

  });


  $("#strPedidos").change(function () {

    preencheAnunciosAdm($("#strPedidos option:selected").val());

  });



  class MobileNavbar {
    constructor(mobileMenu, navList, navLinks) {
      this.mobileMenu = document.querySelector(mobileMenu);
      this.navList = document.querySelector(navList);
      this.navLinks = document.querySelectorAll(navLinks);
      this.activeClass = "active";

      this.handleClick = this.handleClick.bind(this);
    }

    animateLinks() {
      this.navLinks.forEach((link, index) => {
        link.style.animation
          ? (link.style.animation = "")
          : (link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3
            }s`);
      });
    }

    handleClick() {
      this.navList.classList.toggle(this.activeClass);
      this.mobileMenu.classList.toggle(this.activeClass);
      this.animateLinks();
    }

    addClickEvent() {
      this.mobileMenu.addEventListener("click", this.handleClick);
    }

    init() {
      if (this.mobileMenu) {
        this.addClickEvent();
      }
      return this;
    }
  }

  const mobileNavbar = new MobileNavbar(
    ".mobile-menu",
    ".nav-list",
    ".nav-list li",
  );
  mobileNavbar.init();


  $('.send_contact').click(function () {

    $.ajax({
      type: "POST",
      url: controller,
      data: "action=enviaEmail&destinatario=" + $(".strEmailContact").val() + "&texto=" + $(".strTextContact").val() + "&remetente=" + $(".strEmailUser").val(),
      success: function (data) {
        if (data == "true") {
          alert("E-mail enviado com sucesso!");
          $(".strTextContact").val("");
        } else {
          alert("Erro ao enviar e-mail: " + data);
        }
      }
    })
  });




  $('#btnCadastrarConta').click(function () {
    if ($(".obrigatorioC").val() == "") {
      alert("Preencha os campos obrigatórios!");
      return false;
    } else {

      if ($(".strSenhaCadas").val() != $(".strRSenhaCadas").val()) {
        alert("Senha incorreta. Favor, digitar senha novamente!");
        return false;
      } else {
        enviarCadastro($(".strNomeCadas").val(), $(".strEmailCadas").val(), $(".strSenhaCadas").val());

      }
    }
  });

  $('#btnEntrarConta').click(function () {
    if ($(".obrigatorioL").val() == "" || $(".strSenhaLogin").val() == "") {
      alert("Preencha o e-mail e a senha!");
      return false;
    } else {
      entrar($(".strEmailLogin").val(), $(".strSenhaLogin").val());
    }
  });


  $('#enviaAnuncio').click(function () {

    if ($(".obrigatorio").val() == "") {
      alert("Preencha os campos obrigatórios!");
      return false;
    }

    var form_data = new FormData();

    form_data.append('file', $('#file').prop('files')[0]);

    $.ajax({
      url: 'upload.php',
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function (data) {
        console.log("upload realizado com sucesso!: " + data)
      }
    });


    $.ajax({
      type: "POST",
      url: controller,
      data: "action=salvaAnuncio&strTitulo=" + $("#strTitulo").val() + "&strEspecie=" + $("#strEspecie").val() + "&strRaca=" + $("#strRaca").val() + "&strIdade=" + $("#strIdade").val() + "&strSexo=" + $("#strSexo").val() + "&stPorte=" + $("#stPorte").val() + "&strEstado=" + $("#strEstado").val() + "&strBairro=" + $("#strBairro").val() + "&strDescricao=" + $("#strDescricao").val() + "&strImagem=" + $('#file').prop('files')[0].name + "&telefone=" + $("#telefone").val(),
      success: function (data) {
        if (data == "true") {
          alert("Animal cadastrado com sucesso!");
          window.location.href = "/seufielamigo/cadastros.php";
        } else {
          alert("Erro ao cadastrar: " + data);
        }
      }
    })

  });



  $("body").on("click", ".btn-excluir", function () {

    $.ajax({
      type: "POST",
      url: controller,
      data: "action=excluirPet&numIdPet=" + $(this).attr("identificador"),
      success: function (data) {
        if (data == "true") {
          alert("Animal excluído com sucesso!");
          preencheAnuncios();
        } else {
          alert("Erro ao excluir: " + data);
        }
      }
    })

  })


  $("body").on("click", ".btn-aprovar", function () {

    $.ajax({
      type: "POST",
      url: controller,
      data: "action=aprovarPet&numIdPet=" + $(this).attr("identificador"),
      success: function (data) {
        if (data == "true") {
          alert("Animal aprovado com sucesso!");
          preencheAnunciosAdm();
        } else {
          alert("Erro ao excluir: " + data);
        }
      }
    })

  })

  $("body").on("click", ".btn-reprovar", function () {

    $.ajax({
      type: "POST",
      url: controller,
      data: "action=reprovarPet&numIdPet=" + $(this).attr("identificador"),
      success: function (data) {
        if (data == "true") {
          alert("Animal reprovado com sucesso!");
          preencheAnunciosAdm();
        } else {
          alert("Erro ao excluir: " + data);
        }
      }
    })

  })


  $("body").on("click", ".btn-desativarUser", function () {

    $.ajax({
      type: "POST",
      url: controller,
      data: "action=desativarUser&numIdUser=" + $(this).attr("identificador"),
      success: function (data) {
        if (data == "true") {
          alert("Usuário excluído com sucesso!");
          preencheUsuariosAdm();
        } else {
          alert("Erro ao excluir: " + data);
        }
      }
    })

  })

  $('#verUsuarios').click(function () {
    $(".anunciosHidden").hide();
    $(".usuariosHidden").show();
  });

  $('#verAnuncios').click(function () {
    $(".anunciosHidden").show();
    $(".usuariosHidden").hide();
  });

});




function comboEstado() {
    $.ajax({
        type: "POST",
        url: controller,
        data: "action=carregaEstado",
        success: function (data) {
            $.ajax({
                type: 'POST',
                url: 'tmp/comboEstado.php',
                data: "obj=" + data,
                success: function (msg) {
                    $(".strEstado").html(msg);
                }
            })
        }
    })
}


function comboBairro(uf) {
    $.ajax({
        type: "POST",
        url: controller,
        data: "action=carregaBairro&uf=" + uf,
        success: function (data) {
            $.ajax({
                type: 'POST',
                url: 'tmp/comboBairro.php',
                data: "obj=" + data,
                success: function (msg) {
                    $(".strBairro").html(msg);
                }
            })
        }
    })
}

function enviarCadastro(nome, email, senha) {

    $.ajax({
        type: "POST",
        url: controller,
        data: "action=cadastrarLogin&nome=" + nome + "&email=" + email + "&senha=" + senha,
        success: function (data) {
            console.log(data);
            clearInput();
            entrar(email, senha);
            // window.location.href = "/seufielamigo/index.php";
        }
    })
}

function entrar(email, senha) {

    $.ajax({
        type: "POST",
        url: controller,
        data: "action=login&email=" + email + "&senha=" + senha,
        success: function (data) {
            console.log(data);
            if (data == "true") {
                clearInput();
                window.location.href = "/seufielamigo/index.php";
            } else {
                alert(data);
            }

        }
    })
}


function clearInput() {
    $(".inputLogin").val("");
}

function preencheAnuncios() {

    $.ajax({

        type: "POST",
        url: controller,
        data: 'action=pesquisarAnuncios' + '&numIdUser=' + $(".numIdUser").val(),

        success: function (retorno) {

            var obj = JSON.parse(retorno)

            var texto = "";

            obj.forEach(function (item) {

                if (item.strAprovacao == null) {
                    texto += `<center>• ${item.strTitulo}</center><br>`;
                }

            });

            $('#mensagemAnalise').html(`<center>Aguarde! Anúncio(s) em análise:</center><br>${texto}`);

            if (retorno == "[]") {
                $('#listAnuncios').html("<center>Ops! Nenhum pet encontrado. :'( </center>");
                return false;
            }

            $.ajax({
                type: "POST",
                url: "tmp/list-Anuncios.php",
                data: 'obj=' + retorno,

                success: function (data) {

                    $('#listAnuncios').html(data);

                }

            });

        }

    });
}

function preencheAnunciosAdm(filtro) {

    $.ajax({

        type: "POST",
        url: controller,
        data: 'action=pesquisarAnunciosAdm&filtro=' + filtro,

        success: function (retorno) {

            if (retorno == "[]") {
                $('#listAnunciosGlobal').html("<center>Ops! Nenhum dado encontrado. :'( </center>");
                return false;
            }

            $.ajax({
                type: "POST",
                url: "tmp/list-Global.php",
                data: 'obj=' + retorno,

                success: function (data) {

                    $('#listAnunciosGlobal').html(data);

                }

            });

        }

    });
}

function preencheUsuariosAdm() {

    $.ajax({

        type: "POST",
        url: controller,
        data: 'action=preencheUsuariosAdm',

        success: function (retorno) {

            if (retorno == "[]") {
                $('#listUsuariosGlobal').html("<center>Ops! Nenhum dado encontrado. :'( </center>");
                return false;
            }

            $.ajax({
                type: "POST",
                url: "tmp/list-UsuarioGlobal.php",
                data: 'obj=' + retorno,

                success: function (data) {

                    $('#listUsuariosGlobal').html(data);

                    $("#strSelectPerfil").change(function () {

                        editaPerfil($(this).attr("ident"), $("#strSelectPerfil option:selected").val());

                    });

                }

            });

        }

    });
}



function anuncioPrincipal(especie, porte, sexo, estado, bairro) {

    $.ajax({

        type: "POST",
        url: controller,
        data: 'action=anuncioPrincipal' + '&especie=' + especie + '&porte=' + porte + '&sexo=' + sexo + '&estado=' + estado + '&bairro=' + bairro,

        success: function (retorno) {

            $.ajax({
                type: "POST",
                url: "tmp/list-Principal.php",
                data: 'obj=' + retorno,

                success: function (data) {

                    $('#div_anuncios').html(data);

                }

            });

        }

    });
}


/* Máscaras ER */
function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}
function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}
function mtel(v) {
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id(el) {
    return document.getElementById(el);
}
window.onload = function () {
    id('telefone').onkeyup = function () {
        mascara(this, mtel);
    }
}


function editaPerfil(id, perfil) {

    $.ajax({
        type: "POST",
        url: controller,
        data: "action=editarPerfil&perfil=" + perfil + "&id=" + id,
        success: function (data) {
            alert("Perfil alterado com sucesso!");
            preencheUsuariosAdm()
        }
    })
}
<?php
require '../controller/seguranca.php';
require '../models/pessoa.php';
include 'header.php';
?>
<div class="content-header">
    <h1>
        Pessoa Jurídica
        <small>Editar cadastro</small>
    </h1>
</div>
<br/>
<?php
if (isset($_GET["id"])) {
    $pessoa = new Pessoa();
    $dados = $pessoa->mostrar_dados_pessoa($_GET["id"]);
}
?>
<?php
if (isset($_SESSION["erro"])) {
    ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
        <?= $_SESSION["erro"] ?>
    </div>
    <?php
    unset($_SESSION["erro"]);
}

if (isset($_SESSION['sucesso'])) {
    ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Concluído!</h4>
        <?= $_SESSION['sucesso'] ?>
    </div>
    <?php
    unset($_SESSION["sucesso"]);
}
?>
<form enctype="multipart/form-data" action="../controller/editar_pessoa.php" method="POST">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li id="lidados" class="active"><a href="#dados-principais" data-toggle="tab">Dados Principais</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="dados-principais">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Razão social*</label>
                                    <input type="hidden" name="id_pessoa" value="<?= @$dados["id_pessoa"] ?>"/>
                                    <input type="text" name="nome" id="nome" class="form-control" value="<?= @$dados["nome"] ?>" required="required"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome fantasia*</label>
                                    <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" value="<?= @$dados["nome_fantasia"] ?>" required="required"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cpf_cnpj">CNPJ*</label>
                                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control mask-cnpj" placeholder="00.000.000/0000-00" value="<?= @$dados["cpf_cnpj"] ?>" required="required"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="exemplo@exemplo.com" value="<?= @$dados["email"] ?>" required="required"/>
                                </div>
                            </div><div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Inscrição estadual*</label>
                                    <input type="text" name="inscricao_estadual" id="inscricao_estadual" class="form-control mask-insc-estadual" placeholder="000.000.00-0" value="<?= @$dados["inscricao_estadual"] ?>" required="required"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nome">Inscrição municipal*</label>
                                    <input type="text" name="inscricao_municipal" id="inscricao_municipal" class="form-control mask-insc-municipal" placeholder="000.000.00-0" value="<?= @$dados["inscricao_municipal"] ?>" required="required"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fixo">Telefone (fixo)*</label>
                                    <input type="text" name="fixo" id="fixo" class="form-control mask-telefone" placeholder="(00) 0000-0000" value="<?= @$dados["fixo"] ?>" required="required"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="celular">Celular*</label>
                                    <input type="text" name="celular" id="celular" class="form-control mask-celular" placeholder="(00) 00000-0000" value="<?= @$dados["celular"] ?>" required="required"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="endereco">Endereço*</label>
                                    <input type="text" name="endereco" id="endereco" class="form-control" value="<?= @$dados["endereco"] ?>" required="required"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bairro">Bairro*</label>
                                    <input type="text" name="bairro" id="bairro" class="form-control" value="<?= @$dados["bairro"] ?>" required="required"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="numero">N°*</label>
                                    <input type="number" name="numero" id="numero" class="form-control" value="<?= @$dados["numero"] ?>" required="required"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cidade">Cidade*</label>
                                    <input type="text" name="buscar_cidade" id="buscar_cidade" class="form-control" value="<?= @$dados["cidade"] ?>" required="required"/>
                                    <input type="hidden" name="cidade" id="cidade" class="form-control"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cep">CEP*</label>
                                    <input type="text" name="cep" id="cep" class="form-control mask-cep" placeholder="00000-000" value="<?= @$dados["cep"] ?>" required="required"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="senha">Senha de Acesso</label>
                                    <input type="password" name="senha" id="senha" class="form-control"/>
                                </div>
                            </div>
                            <input type="hidden" value="1" name="flg_pessoa_juridica"/>
<!--                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="img_user">Foto de Perfil</label>
                                    <div class="" id="divImg" style="height: 100px; width: 100px">
                                        <a href="#" id="removerImg" title="Remover imagem" class="btn btn-xs"><i class="fa fa-remove"></i></a>
                                        <img src="../img/default.jpg" id="imagepreview" style="height: 100px; width: 100px"/>
                                    </div>
                                    <br/>
                                    <br/>
                                    <input type="file" class="btn-file" name="img_user" id="img_user"/>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <div class="box-footer ">
                        <button type="submit" class="btn btn-primary pull-right">Salvar</button>
                    </div>
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
</form>
<?php
include 'footer.php';
?>

<script>
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagepreview').prop('src', e.target.result).show();
                },
                        reader.readAsDataURL(input.files[0]);
            }
        }
        $("#img_user").change(function () {
            readURL(this);
            $('#imagepreview').show();
        });
        $('#imagepreview').click(function () {
            $('#img_user').replaceWith($('#img_user').clone(true));
            $('#imagepreview').hide();
        });

        $("#removerImg").click(function (event) {
            event.preventDefault();
            $("#img_user").val('');
            $("#imagepreview").attr('src', '../img/<?= @$dados["img_user"] == "" || @$dados["img_user"] == null?"../img/default.jpg":"../img/".$dados["img_user"]  ?>');
        });

        $("#proximo").click(function () {
            $("#lidados").removeClass("active");
            $("#dados-principais").removeClass("active");
            $("#licomplement").addClass("active");
            $("#acomplemet").attr("aria-expanded", "true");
            $("#acessos").addClass("active");

        });

        $("#voltar").click(function () {
            $("#lidados").addClass("active");
            $("#dados-principais").addClass("active");
            $("#licomplement").removeClass("active");
            $("#acomplemet").attr("aria-expanded", "false");
            $("#acessos").removeClass("active");

        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#buscar_cidade").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '../controller/autocomplete_cidades.php',
                    type: "POST",
                    dataType: "json",
                    data: {term: request.term},
                    success: function (data) {
                        response($.map(data, function (item) {
                            return {label: item[1] + " " + "(" + item[2] + ")", val: item[0]};
                        }));
                    }
                });
            },
            search: function (event, i) {
                $(this).addClass('loader');
            },
            response: function (event, i) {
                $(this).removeClass('loader');
                if (!i.content.length) {
                    var semresultado = {label: "Nenhum resultado encontrado", value: ""};
                    i.content.push(semresultado);
                }
            },
            select: function (event, i) {
                $("#cidade").val(i.item.val);
                $(this).removeClass('loader');
            },
            change: function (event, ui) {
                $(this).removeClass('loader');
                if (ui.item === null) {
                    $(this).val('');
                    $('#cidade').val('');

                }
            }
        });
    });
</script>
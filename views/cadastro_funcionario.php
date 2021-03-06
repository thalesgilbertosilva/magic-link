<?php
require '../controller/seguranca.php';
require '../models/pessoa.php';
include 'header.php';
?>
<div class="content-header">
    <h1>
        Funcionário
        <small>Cadastro</small>
    </h1>
</div>
<br/>
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
?>
<form enctype="multipart/form-data" action="../controller/cadastrar_pessoa.php" method="POST">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li id="lidados" class="active"><a href="#dados-principais" data-toggle="tab">Dados da pessoa</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="dados-principais">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome*</label>
                                    <input type="text" name="nome" id="nome" class="form-control" required="required"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="data_nascimento">Data de Nascimento*</label>
                                    <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required="required"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="sexo">Sexo*</label>
                                    <select class="form-control" name="sexo" id="sexo" required="required">
                                        <option value="">Selecione</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cpf_cnpj">CPF*</label>
                                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control mask-cpf" placeholder="000.000.000-00" required="required"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email para Acesso*</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="exemplo@exemplo.com" required="required"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fixo">Telefone (fixo)*</label>
                                    <input type="text" name="fixo" id="fixo" class="form-control mask-telefone" placeholder="(00) 0000-0000" required="required"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="celular">Celular*</label>
                                    <input type="text" name="celular" id="celular" class="form-control mask-celular" placeholder="(00) 00000-0000" required="required"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="endereco">Endereço*</label>
                                    <input type="text" name="endereco" id="endereco" class="form-control" required="required"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bairro">Bairro*</label>
                                    <input type="text" name="bairro" id="bairro" class="form-control" required="required"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="numero">N°*</label>
                                    <input type="number" name="numero" id="numero" class="form-control" required="required"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cidade">Cidade*</label>
                                    <input type="text" name="buscar_cidade" id="buscar_cidade" class="form-control"/>
                                    <input type="hidden" name="cidade" id="cidade" class="form-control" value="222"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cep">CEP*</label>
                                    <input type="text" name="cep" id="cep" class="form-control mask-cep" placeholder="00000-000" required="required"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="senha">Senha de Acesso*</label>
                                    <input type="password" name="senha" id="senha" class="form-control" required="required"/>
                                </div>
                            </div>
                            <input type="hidden" value="1" name="flg_funcionario"/>
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
                        <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
                    </div>
                </div>
            </div>
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
            $("#imagepreview").attr('src', '../img/default.jpg');
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
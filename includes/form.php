<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $URL; ?>app/assets/css/signUp.css">
    <title>Teste Paytour - Desenvolvedor Full Stack</title>
</head>

<body>
    <div class="wrapper">

        <div class="content">
            <a href="index.php">Voltar para Home</a>
            <form method="POST" enctype="multipart/form-data">
                <h4>Teste Paytour - Desenvolvedor Full Stack</h4>

                <div class="alert">
                    <p></p><!-- EXIBE O ALERTA DE ERRO E/OU SUCESSO -->
                </div>


                <div class="input">
                    <div class="label">
                        <label class="input-label-select">Nome *</label>
                        <label class="input-label-select">Email *</label>
                    </div>

                    <div class="input-select">

                        <input type="text" name="nome" id="nome" placeholder="Ex. Ana, Antonio de Melo">
                        <input type="email" name="email" id="email" placeholder="Ex. juniormelo26@hotmail.com">

                    </div>
                </div>
                <div class="input">
                    <div class="label">
                        <label class="input-label-select">Telefone *</label>
                        <label class="input-label-select">Cargo Desejado *</label>
                    </div>

                    <div class="input-select">

                        <input type="telefone" name="telefone" id="telefone" onkeypress="mask(this, telefone);" onblur="mask(this, telefone);" placeholder="Ex. (84) 98814-7799">
                        <input type="text" name="cargo" id="cargo" placeholder="Ex. Desenvolvedor FullStack">

                    </div>
                </div>
                <div class="input">
                    <div class="label">
                        <label class="input-label-select">Escolaridade *</label>
                        <label class="input-label-select">Arquivo - pdf - doc - docx | m??ximo: 1MB *</label>
                    </div>
                    <div class="input-select">

                        <select class="select" id="escolaridade" name="escolaridade">
                            <option value="">Escolaridade</option>
                            <option value="Medio incompleto">M??dio incompleto</option>
                            <option value="Medio completo">M??dio completo</option>
                            <option value="Superior incompleto">Superior incompleto</option>
                            <option value="Superior completo">Superior completo</option>
                            <option value="Pos-gradua????o incompleto">P??s-gradua????o incompleto</option>
                            <option value="Pos-gradua????o completo">P??s-gradua????o completo</option>

                        </select>
                        <input type="file" id="arquivo" name="arquivo">
                    </div>
                </div>

                <div class="input-textarea">
                    <label class="input-label">Observa????es</label>
                    <textarea name="observacao" id="obs" placeholder="Descreva aqui as informa????es que achar relevantes!"></textarea>
                </div>

                <button>Cadastrar</button>
                <span class="required">* Campos obrigat??rios</span>


            </form>

        </div>

    </div>
    </div>
    <script src="<?php echo $URL; ?>app/assets/js/signUp.js"></script>
</body>

</html>
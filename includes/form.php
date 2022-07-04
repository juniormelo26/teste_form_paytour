<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $URL; ?>app/assets/css/signUp.css">
    <title>Teste Paytour - Developer Fullstack</title>
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <form method="POST" enctype="multipart/form-data">
                <h4>Teste Paytour - Developer Fullstack</h4>

                <div class="alert">
                    <p>Email ou senha incorretos!</p>
                </div>


                <div class="input">
                    <div class="label">
                        <label class="input-label-select">Nome *</label>
                        <label class="input-label-select">Email *</label>
                    </div>

                    <div class="input-select">

                        <input type="text" name="nome" id="nome" placeholder="Nome">
                        <input type="text" name="email" id="email" placeholder="Email">

                    </div>
                </div>
                <div class="input">
                    <div class="label">
                        <label class="input-label-select">Telefone *</label>
                        <label class="input-label-select">Cargo Desejado *</label>
                    </div>

                    <div class="input-select">

                        <input type="text" name="telefone" id="telefone" onkeypress="mask(this, telefone);" onblur="mask(this, telefone);" placeholder="Telefone">
                        <input type="text" name="cargo" id="cargo" placeholder="Cargo desjejado">

                    </div>
                </div>
                <div class="input">
                    <div class="label">
                        <label class="input-label-select">Escolaridade *</label>
                        <label class="input-label-select">Curriculo - pdf - doc - docx | máximo: 1MB *</label>
                    </div>
                    <div class="input-select">

                        <select class="select" id="escolaridade" name="escolaridade">
                            <option value="">Escolaridade</option>
                            <option value="1">Médio incompleto</option>
                            <option value="2">Médio completo</option>
                            <option value="3">Superior incompleto</option>
                            <option value="4">Superior completo</option>
                            <option value="5">Pós-graduação incompleto</option>
                            <option value="6">Pós-graduação incompleto</option>

                        </select>
                        <input type="file" id="arquivo" name="arquivo">
                    </div>
                </div>

                <div class="input-textarea">
                    <label class="input-label">Observações</label>
                    <textarea name="observacao" id="observacao" placeholder="Descreva aqui as informações que achar relevantes!"></textarea>
                </div>

                <button>Cadastrar</button>
                <span class="required">* Campos obrigatórios</span>


            </form>

        </div>

    </div>
    </div>
    <script src="<?php echo $URL; ?>app/assets/js/signUp.js"></script>
</body>

</html>
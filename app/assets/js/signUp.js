// DECLARAÇÃO DE VARIAVEIS
const form = document.querySelector("form");
const inputNome = document.querySelector("#nome");
const inputEmail = document.querySelector("#email");
const inputTelefone = document.querySelector("#telefone");
const inputCargo = document.querySelector("#cargo");
const inputEscolaridade = document.querySelector("#escolaridade");
const inputObservacao = document.querySelector("#obs");
const inputArquivo = document.querySelector("#arquivo");
const alert = document.querySelector(".alert");
const txtAlert = document.querySelector(".alert p");
const btn = document.querySelector("button");

// CANCELA O EVENTO DO FORM CASO SEJA CANCELAVEL
form.addEventListener("submit", async (e) => {
  e.preventDefault();
});

btn.onclick = async () => {
  // PEGANDO VALORES DOS CAMPOS
  const nome = inputNome.value;
  const email = inputEmail.value;
  const telefone = inputTelefone.value;
  const cargo = inputCargo.value;
  const escolaridade = inputEscolaridade.value;
  const observacao = inputObservacao.value;
  const arquivo = inputArquivo.value;

  // FUNÇÃO PARA EXIBIR O ALERTA DE ERRO NO FRONT
  async function alertError(error) {
    txtAlert.innerText = error;
    alert.classList.add("show");
    setTimeout(() => {
      alert.classList.remove("show");
    }, 3000);
  }

  // FUNÇÃO PARA EXIBIR O ALERTA DE SUCESSO NO FRONT
  async function alertSucces(sucess) {
    txtAlert.innerText = sucess;
    alert.classList.add("success");
    setTimeout(() => {
      alert.classList.remove("success");
    }, 3000);
  }

  /* FUNÇÃO RESPONSÁVEL PARA VALIDAR TAMANHO DOS ARQUIVOS PARA UPLOAD;
    TAMANHO PERMITIDO = 1MB
   */
  async function fileSize() {
    if (inputArquivo.files && inputArquivo.files[0]) {
      if (inputArquivo.files[0].size > 1048576) {
        inputArquivo.focus();
        error = `O ARQUIVO EXCEDE O TAMANHO DE 1MB`;
        alertError(error);
        inputArquivo.value = "";
      } else {
        sendData(); /* CASO O TAMANHO DO ARQUIVO SEJA MENOR QUE 1MB ENVIA OS DADOS*/
        // CHAMA A FUNÇÃO sendData();
      }
    }
  }
  /* FUNÇÃO RESPONSÁVEL PARA VALIDAR OS TIPOS DE arquivos
      PERMITIDOS PARA UPLOAD;
  */
  async function validateExtensions() {
    // if (arquivo) {
    const extensoesPermitidas = /(.doc|.docx|.pdf)$/i;
    const extValid = !extensoesPermitidas.exec(arquivo);
    if (extValid) {
      inputArquivo.focus();
      error = `${arquivo.split(".").pop()} - É UM TIPO DE ARQUIVO INVÁLIDO!`;
      alertError(error);
      inputArquivo.value = "";
      return false;
    } else {
      fileSize(); /* SE A EXTENSÃO DO ARQUIVO FOR ACEITA CHAMA FUNÇÃO fileSize() */
    }
  }

  /* FUNÇÃO RESPONAVEL POR ENVIAR OS DADOS */

  async function sendData() {
    const dados = new FormData(form);
    const d = await fetch(`./cadastrar.php`, {
      method: "POST",
      body: dados,
    });
    const resṕonse = d.status;

    if (resṕonse === 200) {
      sucess = "DADOS ENVIADOS COM SUCESSO!";
      alertSucces(sucess);
      form.reset();
      setTimeout(() => {
        location.href = "index.php";
      }, 3000);
    } else {
      error = "NÃO FOI POSSIVEL ENVIAR OS DADOS, TENTE MAIS TARDE!";
      alertError(error);
      return false;
    }
  }

  if (nome == "") {
    inputNome.focus();
    error = "PREENCHA O CAMPO NOME!";
    alertError(error);
  } else if (email == "") {
    inputEmail.focus();
    error = "PREENCHA O CAMPO EMAIL!";
    alertError(error);
  } else if (telefone == "") {
    inputTelefone.focus();
    error = "PREENCHA O CAMPO TELEFONE!";
    alertError(error);
  } else if (cargo == "") {
    inputCargo.focus();
    error = "PREENCHA O CAMPO CARGO!";
    alertError(error);
  } else if (escolaridade == "") {
    inputEscolaridade.focus();
    error = "PREENCHA O CAMPO ESCOLARIDADE!";
    alertError(error);
  } else if (arquivo == "") {
    inputArquivo.focus();
    error = "VOCÊ PRECISA ANEXAR 1 ARQUIVO!";
    alertError(error);
  } else {
    validateExtensions();
  }
};

// FUNÇÃO PARA MASCARA DE TELEFONE
function mask(o, f) {
  setTimeout(function () {
    var v = telefone(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function telefone(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, ""); //limpa o campo se começar com ZERO (0)
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}

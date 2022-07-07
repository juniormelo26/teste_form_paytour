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
  // USANSO trim() PARA RETIRAR OS ESPAÇOS EM BRANCO
  const nome = inputNome.value.trim();
  const email = inputEmail.value.trim();
  const telefone = inputTelefone.value.replace(/[^0-9]+/g, ""); // REMOVE CARATCTRES ESPECIAIS DA MASCARA
  const cargo = inputCargo.value.trim();
  const escolaridade = inputEscolaridade.value;
  const observacao = inputObservacao.value.trim();
  const arquivo = inputArquivo.value;
  console.log(telefone);

  /* FUNÇÃO PARA EXIBIR O ALERTA DE ERRO NO FRONT */
  async function alertError(error) {
    txtAlert.innerText = error;
    alert.classList.add("show");
    setTimeout(() => {
      alert.classList.remove("show");
    }, 3000);
  }

  /*  FUNÇÃO PARA EXIBIR O ALERTA DE SUCESSO NO FRONT */
  async function alertSucces(sucess) {
    txtAlert.innerText = sucess;
    alert.classList.add("success");
    setTimeout(() => {
      alert.classList.remove("success");
    }, 3000);
  }

  /* FUNÇÃO RESPONSÁVEL PARA VALIDAR TAMANHO DOS ARQUIVOS PARA UPLOAD -  TAMANHO PERMITIDO = 1MB */
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
  /* FUNÇÃO RESPONSÁVEL PARA VALIDAR OS TIPOS DE arquivos PERMITIDOS PARA UPLOAD; */
  async function validateExtensions() {
    const extensoesPermitidas = /(.doc|.docx|.pdf)$/i;
    const extValid = !extensoesPermitidas.exec(arquivo);
    if (extValid) {
      inputArquivo.focus();
      error = `${arquivo.split(".").pop()} - NÃO É UM ARQUIVO VÁLIDO!`;
      alertError(error);
      inputArquivo.value = "";
      return false;
    } else {
      return fileSize(); /* SE A EXTENSÃO DO ARQUIVO FOR ACEITA CHAMA FUNÇÃO fileSize() */
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
      /*  setTimeout(() => {
        location.href = "index.php";
      }, 3000); */
    } else {
      error = "NÃO FOI POSSIVEL ENVIAR OS DADOS, TENTE MAIS TARDE!";
      alertError(error);
      return false;
    }
  }

  /* VALIDAÇÃO DE CAMPOS EM NO LADO CLIENTE */
  async function validateForm() {
    if (nome === "") {
      inputNome.value = "";
      inputNome.focus();
      alertError((error = "PREENCHA O CAMPO NOME!"));
    } else if (nome.length < 3) {
      inputNome.focus();
      alertError((error = "NOME PRECISA NO MINIMO 3 CARACTERES!"));
    } else if (email === "") {
      inputEmail.value = "";
      inputEmail.focus();
      error = "PREENCHA O CAMPO EMAIL!";
      alertError(error);
    } else if (!isEmail(email)) {
      inputEmail.value = "";
      inputEmail.focus();
      error = "INFORME UM EMAIL VÁLIDO!";
      alertError(error);
    } else if (telefone === "") {
      inputTelefone.focus();
      error = "PREENCHA O CAMPO TELEFONE!";
      alertError(error);
    } else if (cargo === "") {
      inputCargo.value = "";
      inputCargo.focus();
      error = "PREENCHA O CAMPO CARGO!";
      alertError(error);
    } else if (escolaridade === "") {
      inputEscolaridade.focus();
      error = "PREENCHA O CAMPO ESCOLARIDADE!";
      alertError(error);
    } else if (arquivo === "") {
      inputArquivo.focus();
      error = "VOCÊ PRECISA ANEXAR 1 ARQUIVO!";
      alertError(error);
    } else {
      validateExtensions();
    }
  }
  validateForm();
};

/* FUNÇÃO PARA VALIDAR EMAIL */
function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
}
/* FUNÇÃO PARA MASCARA DE TELEFONE */
function mask(o) {
  setTimeout(function () {
    var v = telefone(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function telefone(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
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

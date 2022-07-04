/* const form = document.querySelector("form");
const inputN = document.querySelector("#nome");
const inputE = document.querySelector("#email");
const inputT = document.querySelector("#telefone");
const inputC = document.querySelector("#cargo");
const inputES = document.querySelector("#escolaridade");
const inputOb = document.querySelector("#observacao");
const inputARQ = document.querySelector("#arquivo");

const alert = document.querySelector(".alert");
const txtAlert = document.querySelector(".alert p");
const error_text = document.querySelector(".alert p");
const btn = document.querySelector("button");

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  const dados = new FormData(form);
  const d = await fetch("../cadastrar.php", {
    method: "POST",
    body: dados,
  });

  const res = await d.json();

  console.log("RES", res);
});

btn.onclick = () => {
  const nome = inputN.value;
  const email = inputE.value;
  const telefone = inputT.value;
  const cargo = inputC.value;
  const escolaridade = inputES.value;
  const observacao = inputOb.value;
  const arquivo = inputARQ.value;

  if (nome == "") {
    console.log("preencha o nome");
    txtAlert.innerText = "Erro: preencha o campo Nome!";
    alert.classList.add("show");
    setTimeout(() => {
      alert.classList.remove("show");
    }, 3000);
  } else if (email == "") {
    txtAlert.innerText = "Erro: preencha o campo Email!";
    alert.classList.add("show");
    setTimeout(() => {
      alert.classList.remove("show");
    }, 3000);
  } else if (telefone == "") {
    txtAlert.innerText = "Erro: preencha o campo Telefone!";
    alert.classList.add("show");
    setTimeout(() => {
      alert.classList.remove("show");
    }, 3000);
  } else if (cargo == "") {
    txtAlert.innerText = "Erro: preencha o campo Cargo!";
    alert.classList.add("show");
    setTimeout(() => {
      alert.classList.remove("show");
    }, 3000);
  } else if (escolaridade == "") {
    txtAlert.innerText = "Erro: preencha o campo Escolaridade!";
    alert.classList.add("show");
    setTimeout(() => {
      alert.classList.remove("show");
    }, 3000);
  } else if (arquivo == "") {
    txtAlert.innerText = "Erro: favor anexar o Arquivo!";
    alert.classList.add("show");
    setTimeout(() => {
      alert.classList.remove("show");
    }, 3000);
  } else {
    form.reset();
  }

  console.log(nome);
  console.log(email);
  console.log(telefone);
  console.log(cargo);
  console.log(escolaridade);
  console.log(observacao);
  console.log(arquivo);
};
 */
// ================================ FUNÇÃO PARA MASCARA DE TELEFONE =============================================
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

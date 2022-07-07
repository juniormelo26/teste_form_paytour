# Informações sobre o Teste

Informações sobre o teste para o processo seletivo de Desenvolvedor Full Stack no Paytour.

Como estamos em processo de aceleração, o teste neste momento tem por objetivo otimizar o processo seletivo, diminuindo o tempo de contratação.

Importante:

Forma de Envio: Publicar em algum repositório (Github ou outro) deixando o código acessível. Favor nos notificar no e-mail dev@paytour.com.br o local onde o teste foi publicado.

Requisitos do Teste

Criar um formulário para envio de currículos com os seguintes campos:
Nome,
e-mail,
telefone,
Cargo Desejado (Campo texto livre),
Escolaridade (Campo select),
observações,
arquivo
e data e hora do envio.

Observações:

O formulário deve ser validado

Apenas o campo observações é opcional

Não devem ser aceitos arquivos que não possuam as seguintes extensões: .doc, .docx ou .pdf

O tamanho máximo do arquivo é de 1MB

Coloque as validações que você achar necessário

Use o PSR-2 como padrão de codificação

As bibliotecas devem ser carregadas via composer

Fique à vontade para usar qualquer framework da sua preferência (ou nenhum)

Os dados devem ser armazenados em um banco de dados. Além das informações acima, o IP e a data e hora do envio devem ficar registrados

Um e-mail deve ser enviado com os dados do formulário

Em até 03 (três) dias úteis após o envio do teste estaremos entrando em contato com todos os candidatos

dando retorno sobre o resultado do teste e agendando entrevistas com os candidatos aprovados nesta primeira fase.

# Informaçoes sobre a utilização

## Banco de dados

Crie um banco de dados e execute as instruções SQLs abaixo para criar a tabela `curriculos`:

```sql

 Estrutura da tabela `curriculos`

CREATE TABLE `curriculos` (
  `id` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `telefone` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `cargo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `escolaridade` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `observacao` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `arquivo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_estonian_ci NOT NULL,
  `data` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `curriculos`
--
ALTER TABLE `curriculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curriculos`
--
ALTER TABLE `curriculos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
```

## Configuração

As credenciais do banco de dados estão no arquivo `./app/Db/Database.php` e você deve alterar para as configurações do seu ambiente (HOST, NAME, USER e PASS).

## Para o envio correto do email PELO GMAIL, é preciso ativar a opção de apps menos seguros:

[https://myaccount.google.com/security?hl=pt_BR]

## Composer

Para a aplicação funcionar, é necessário rodar o Composer para que sejam criados os arquivos responsáveis pelo autoload das classes.

Caso não tenha o Composer instalado, baixe pelo site oficial: [https://getcomposer.org/download](https://getcomposer.org/download/)

Para rodar o composer, basta acessar a pasta do projeto e executar o comando abaixo em seu terminal:

```shell
 composer install
```

Após essa execução uma pasta com o nome `vendor` será criada na raiz do projeto e você já poderá acessar pelo seu navegador.

## Link do projeto funcionando

[https://juniormelo.dev.br/projetos/paytour]

# Cadastro Ágil

Sistema simples de **cadastro e login de usuários** feito em PHP + MySQL, com foco em
aplicar boas práticas de segurança no armazenamento de credenciais. Projeto de estudo
para praticar back-end e integração com banco de dados.

## O que ele faz

- Formulário de cadastro/login (e-mail + senha)
- Verifica se o e-mail já existe antes de cadastrar (evita duplicidade)
- Salva o usuário no banco com a senha protegida
- Mostrar/ocultar senha no front (JavaScript)

## Decisões de segurança

Mesmo sendo um projeto pequeno, ele aplica duas práticas que protegem dados reais:

- **Prepared statements** (`prepare` + `bind_param`) em vez de concatenar o input direto
  na query — defesa contra **SQL Injection** (OWASP Top 10).
- **`password_hash()`** com `PASSWORD_DEFAULT` — a senha **nunca** é salva em texto puro.
  Se o banco vazar, as senhas continuam protegidas por hash.

```php
// salvar.php — input do usuário entra como parâmetro, nunca colado na SQL
$stmt = $con->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $senha_hash);
```

## Stack

| Camada    | Tecnologia            |
|-----------|-----------------------|
| Front-end | HTML, CSS, JavaScript |
| Back-end  | PHP                   |
| Banco     | MySQL (mysqli)        |

## Estrutura

```
.
├── index.php       # tela de login/cadastro
├── salvar.php      # recebe o POST, valida e grava no banco
├── conexao.php     # conexão com o MySQL
├── css/style.css
└── js/login.js     # toggle de exibir/ocultar senha
```

## Como rodar localmente

1. Suba um ambiente com PHP + MySQL (ex.: **XAMPP** ou **Laragon**).
2. Crie o banco e a tabela:

   ```sql
   CREATE DATABASE site_login;
   USE site_login;

   CREATE TABLE usuarios (
     id    INT AUTO_INCREMENT PRIMARY KEY,
     email VARCHAR(255) NOT NULL UNIQUE,
     senha VARCHAR(255) NOT NULL
   );
   ```

3. Ajuste as credenciais em `conexao.php` para o seu ambiente.
4. Coloque a pasta no diretório do servidor (ex.: `htdocs/`) e acesse `http://localhost/cadastro-agil`.

> **Nota:** as credenciais em `conexao.php` são de ambiente local de estudo.
> Em produção, esses valores devem ficar em variáveis de ambiente, fora do código versionado.

## Próximos passos

- [ ] Tela de login separada validando o hash com `password_verify()`
- [ ] Sessões (`session_start()`) para manter o usuário autenticado
- [ ] Mover credenciais para variáveis de ambiente (`.env`)
- [ ] Mensagens de feedback no front em vez de `echo` direto

---

Feito por [Pedro Meirelles](https://github.com/meirellespedro) como estudo de back-end.

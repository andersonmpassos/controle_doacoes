# Sistema de Gerenciamento de Doações

Este projeto é um sistema web para gerenciamento de doações, doadores e campanhas, desenvolvido em PHP, MySQL, HTML e CSS, seguindo o padrão MVC simples.  

Foi construído como parte do Projeto Integrador VI - A do curso de Análise e Desenvolvimento de Sistemas da Universidade Católica de Pelotas.

---

## Funcionalidades

- Cadastro, edição e listagem de doadores.
- Cadastro, edição e listagem de campanhas de arrecadação.
- Registro e gerenciamento de doações vinculadas a doadores e campanhas.
- Controle de validade dos itens doados.
- Sistema de autenticação e controle de acesso para administradores.
- Visualização e gerenciamento via painéis simples e intuitivos.

---

## Tecnologias Utilizadas

- PHP 7+
- MySQL (Banco de dados)
- HTML5 / CSS3 (Interface)
- Servidor Apache via XAMPP

---

## Estrutura do Projeto

/controle_doacoes
/controller
/model
/view
/partials
/public
/css
index.php
logout.php


---

## Instalação e Execução

1. Configure um servidor local (recomendado: XAMPP) e inicie Apache e MySQL.
2. Clone o repositório ou faça o download dos arquivos.
3. Crie um banco de dados `estacionamento` no MySQL.
4. Importe as tabelas usando os scripts SQL disponíveis no diretório `/database` (ou usar os comandos SQL fornecidos no projeto).
5. Configure o arquivo `model/Conexao.php` para utilizar seu usuário, senha e nome do banco, se necessário.
6. Gere um hash para a senha do administrador e insira um registro na tabela `administrador`.
7. Acesse o sistema pelo navegador via `http://localhost/controle_doacoes/public/index.php`.
8. Faça login com as credenciais administrativas para começar a usar.

---

## Uso

- Após login, o administrador pode cadastrar e gerenciar doadores, campanhas e doações. 
- O sistema controla as doações e ajuda a monitorar as datas de validade.
- Visitantes podem visualizar campanhas e realizar doações (futuras implementações).

---

## Contribuição

Contribuições são bem-vindas!  
Para contribuir, por favor faça um fork do projeto, crie uma branch para sua funcionalidade, faça seu commit e envie um pull request.

---

## Licença

Este projeto está sob licença MIT.  
Veja o arquivo `LICENSE` para mais informações.

---
# SGHSS - Sistema de Gestão Hospitalar e de Serviços de Saúde

Este é um projeto Laravel desenvolvido para fins acadêmicos, utilizando o Laravel Sail como ambiente de desenvolvimento com Docker.

## ✅ Requisitos para rodar o projeto

- Docker instalado na máquina

---

## 🚀 Como rodar o projeto

### 1. Clone este repositório

```bash
git clone https://github.com/luanmarcosdev/project_sghss/tree/main/app_sghss
cd seu-repo
```

### 2. Copie o arquivo .env.example para .env

```bash
cp .env.example .env
```

Esse arquivo contém as configurações do ambiente Laravel. Altere conforme necessário, como o nome da aplicação, configurações de banco de dados, entre outros.

### 3. Instale as dependências com o Composer (usando Docker)

```bash
docker run --rm  
-u "$(id -u):$(id -g)"  
-v $(pwd):/var/www/html  
-w /var/www/html  
laravelsail/php82-composer:latest  
composer install
```

Esse comando vai criar a pasta `vendor/` e permitir o uso do Laravel Sail, usado para rodar a aplicação.

### 4. Suba o ambiente com o Sail

```bash
./vendor/bin/sail up -d
```

A aplicação estará rodando em http://localhost

### 5. Rode as migrations
```bash
./vendor/bin/sail artisan migrate
```

Este comando cria as tabelas no banco de dados.

### 6. Liste as rotas

```bash
./vendor/bin/sail artisan route:list
```

Este comando lista as rotas implementadas na API.

---

## 📁 Estrutura do Projeto

- app_sghss/: Pasta principal com o código Laravel  
- composer.json: Lista de dependências  
- composer.lock: Versões travadas das dependências  
- README.md: Este arquivo

---

## ℹ️ Dicas para testar a API

As rotas podem precisar de cabeçalhos, como:

```
Content-Type: application/json
Accept: application/json
```

E se a rota usar autenticação:

```
Content-Type: application/json
Accept: application/json
Authorization: Bearear seu_token_aqui
```





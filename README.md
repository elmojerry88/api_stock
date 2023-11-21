# Back-End da Aplicação de controle de estoque

### Desenvolvido por: Elmo Jerry Imperial Leitão

## Requisitos

- Docker - para baixar [clique aqui](https://docs.docker.com/engine/install/).
- PHP 8.2- para baixar [clique aqui](https://www.php.net/downloads), caso tiver a usar o linux é necessário instalar todas as libs do php.
- Composer - para baixar [clique aqui](https://getcomposer.org/download/)

## Instalação:

- Após instalar os requisitos de instalação, clique em *code* e baixe o arquivo.
- Abra a sua linha de comando, entre na pasta da aplicação, e execute:

```bash
composer install
```
Esse comado irá instalar todas as dependencias necessárias para rodar a aplicação.

- Após a instalação, crie um arquivo .env e copie todos os arquivos do .env.example para dentro do .env
- Inicie o docker, caso não saiba usar o docker [clique aqui ](https://docker-curriculum.com/) para seguir um tutorial.
- Abra a sua linha de comando dentro da pasta da aplicação e execute:

```bash
php artisan key:generate
```

Esse comando irá gerar uma chaves encriptada para aplicação dentro do arquivo .env em APP_KEY.

- Ainda na sua linha de comando dentro da pasta execute:

```bash
php artisan migrate
```

Esse comando criará todas as tabelas no banco de dados.
É importante destacar que deve ter instalado o docker para conseguir fazer o banco de dados funcionar.

- Depois de executar as migrações, execute:

```bash
php artisan db:seed
```

Esse comando irá criar usuários, armas e agentes no banco de dados.

- Por padrão a aplicação já estará no ar dentro de um container docker.

- A aplicação estará rodar em [http://localhost:8000](http://localhost:8000).

## Rotas da API:

A URL base para acessar os endpoints da api é  [http://localhost:8000/api/](http://localhost:8000/api/)
As rotas disponiveis na api são:çlnbvv 

### User:

- ´/user/´
- ´/user/store´
- ´user/count´

### Police officer:

- ´/officer/´
- ´/officer/store´
- ´/officer/count´

### Leave:

- ´/leave/´
- ´/leave/store´
- ´/leave/count´

### Receive:

- ´/receive/´
- ´/receive/store´
- ´/receive/count´


### Weapon:

- ´/weapon/´
- ´/weapon/store´
- ´/weapon/count´
- ´/weapon/sum´






## NOTA:

- É necessário que tenha baixado o Front-End da aplicação, para uma experiência completa!
- Essa aplicação sofrerá alterações, verique as branchs... pode ser que tenha uma nova versão da aplicação.

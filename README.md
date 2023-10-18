
## Análise o modelo de banco de dados anexado e identifique as entidades, relacionamentos e campos necessários para implementar o sistema.

# Entidades:

	Parceiro
	Matriz / Filial - Loja

# Relacionamentos:

	Parceiro possui uma ou várias Filiais.
	Filial pertence a um Parceiro.
	Loja é uma Matriz ou Filial que está associada a um Parceiro

# Campos Necessários:
	
Parceiro:
	id
	cd_parceiro: Código do Parceiro.
	Nome (Identidade)
Loja:
	id
	parceiro_id (chave estrangeira para o Parceiro)
	cd_loja (sequêncial de filiais)
	cd_pro_negocio (concatenação de Parceiro/Loja)
	razao_social (Identidade da Loja)
	cnpj (chave única que ajuda a manter a consistência)


O diagrama sugere que cada Parceiro possui uma(matriz) e ou várias filiais e o código da filial é gerado com base na quantidade sequencial de filiais atribuidas ao parceiro.
quando a sequencia ou quantidade excede 99 o campo CodProNegocio deve ser modificado.
o Parceiro mantem a mesma regra porem para 999 Parceiros.


## Analise o diagrama fornecido e explique, em detalhes, o que precisa ser feito para integrar esse diagrama no nosso projeto atual. Descreva qualquer modificação ou adição que você considere necessária para implementar com sucesso as funcionalidades indicadas no diagrama.

Dentro do diagrama somente retiraria um dos processos: ja que a sequência é definida pela filial, e a matriz sempre será 1. 

<img src="https://github.com/wheelkorner/vitamina/blob/main/public/vitamina.png">

## Se possível, implemente as models no Laravel com base na modelagem fornecida. Certifique-se de seguir as melhores práticas e padrões de codificação do Laravel.

Foram criadas as Models e Migrates das duas entidades: Parceiros e Lojas

## Requisitos do Projeto

- Ubuntu 22.04 LTS
- Laravel v8.83.27 
- PHP v7.4.33
- MYSQL v8.0.33
- Composer version 2.5.7
- Docker version 24.0.2

## Ferramentas
- Terminator
- Workbench
- Sublime Text

## Etapas para instalar o PHP 7.4 no UBUNTU 22.04 LTS

Atualize o sistema:
```bash
sudo apt update && sudo apt upgrade
```
Adicione o Repositório Ondrej PPA no Ubuntu 22.04:
```bash
sudo apt install software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
```
Instalar:
```bash
sudo apt install php7.4
```
Extensões:
```bash
sudo apt install php7.4- extension_name

sudo apt install php7.4-{cli,common,curl,zip,gd,mysql,xml,mbstring,json,intl}

sudo apt install php7.4-common php7.4-mysql php7.4-xml php7.4-xmlrpc php7.4-curl php7.4-gd php7.4-imagick php7.4-cli php7.4-dev php7.4-imap php7.4-mbstring php7.4-opcache php7.4-soap php7.4-zip php7.4-intl -y

```
Definir como versão padrão:
```bash
sudo update-alternatives --config php
```
Digite um dos números de **“Seleção”** da versão PHP listada que você deseja tornar padrão do sistema.

Desinstale o PHP e remova o Ondrej PPA:
```bash
sudo apt autoremove --purge php7.4
sudo add-apt-repository --remove ppa:ondrej/php -y
```
Verifique e versão do PHP instalada:
```bash
php -v
```

## Instalando o Composer

Instalação:
```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
Verificar link com comandos
https://getcomposer.org/download/

Verificando permissão:
```bash
sudo chmod +x composer.phar
```
Movimentando para a pasta padrão:
```bash
sudo mv composer.phar /usr/local/bin/composer
```
Update
```bash
sudo composer update
```

## Instalando o Laravel

Instalando versão 8.0
```bash
composer create-project laravel/laravel:^8.0 vitamina
```
Entre na pasta da projeto e desde a pasta rode o comando.
```bash
php artisan serve
```
No navegador no endereço configurado por padrão **127.0.0.1:8000** será publicado.


## Instalando Docker
Instalação em UBUNTU

Atualizando APT-GET
```bash
sudo apt-get update
```
Instalando a versão mais recente do Docker
```bash
sudo apt install docker-ce
```
```bash
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
```
Testando instalação:
```bash
sudo systemctl status docker
```

Rodando
```bash
sudo docker run hello-world
```
Este comando baixa uma imagem de teste e a executa em um contêiner. Quando o contêiner é executado, ele imprime uma mensagem de confirmação e sai.

Inicializando uma Instancia do MYSQL
```bash
sudo docker run --name mysql-vitamina -e MYSQL_ROOT_PASSWORD=root -d -p 3306:3306 mysql
```
Help:
```bash
docker docker-subcommand --help
```
comando: 
- docker run  {comando docker}
- --name mysql-prime  {nome do container}
- -e MYSQL_ROOT_PASSWORD=root  {variavel global}
- -p 3306:3306  {porta}
- -d mysql  {imagem}

## Criando a Base de dados

Apôs instalação do MySQL rodar:
```SQL
CREATE DATABASE vitamina
```

## Entrando no mysql do container:
```bash
sudo docker exec -it hash_do_container /bin/bash
```
Acesando mysql com root:
```bash
mysql -proot
```
Visualizando BASES:
```SQL
SHOW databases;
```
Acessando a Base:
```SQL
USE <base>;
```
Visualizando Tabelas:
```SQL
SHOW tables;
```

## Configuração env LARAVEL

- Configuração do arquivo “.env” com a base mysql
- Abrir no SUBLIME ou VSCODE

~~~php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vitamina
DB_USERNAME=root
DB_PASSWORD=***
~~~

Adicionando permissão de pasta:
```bash
sudo chmod 777 -R storage/
```
Testando o ARTISAN e aplicando migrates:

```bash
php artisan
php artisan migrate:install
php artisan migrate:status
php artisan migrate
php artisan migrate:status
```

## Instalando o **AdminLTE**

Dentro da pasta do projeto LARAVEL rodar os comando a seguir:

Baixar
```bash
composer require jeroennoten/laravel-adminlte
```


Instalar
```bash
php artisan adminlte:install
```
Complementos
```bash
composer require laravel/ui
```
Autenticação
```bash
php artisan ui bootstrap --auth
```
Ativando Recursos
```bash
php artisan adminlte:install --only=auth_views
php artisan adminlte:install --only=basic_views
php artisan adminlte:plugins install

php artisan storage:link

```
### Outras configurações:
https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Installation

### Documentação Laravel:
https://laravel.com/

### Mais informações:
Para mudar o idioma de inglês para português altera o arquivo /config→app.php
~~~php
'locale' => 'pt-br',

'timezone' => 'America/Sao_Paulo',
~~~

### Adicionando o Guzzle caso for consumir API

```bash
composer require guzzlehttp/guzzle:~7.0
```
 


## Sobre o Laravel

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Laravel é um framework de aplicações web com sintaxe expressiva e elegante. Acreditamos que o desenvolvimento deve ser uma experiência agradável e criativa para ser verdadeiramente gratificante. O Laravel simplifica o desenvolvimento facilitando tarefas comuns usadas em muitos projetos da web, como:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

O Laravel é acessível, poderoso e fornece as ferramentas necessárias para aplicativos grandes e robustos.

## Learning Laravel

Laravel [documentation](https://laravel.com/docs)
Laracasts [Laracasts](https://laracasts.com)

## Vulnerabilidades de segurança

Se você descobrir uma vulnerabilidade de segurança no Laravel, envie um e-mail para Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). Todas as vulnerabilidades de segurança serão prontamente abordadas.

## Licença

A estrutura Laravel é um software de código aberto licenciado sob a [MIT license](https://opensource.org/licenses/MIT).

http://displaysolutions.samsung.com/docs/display/MS1/Open+API#breadcrumbs

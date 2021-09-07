## Comandos Iniciais

01 - Rodar o Servidor

```
// Versão 4
php -S localhost:8000 -t public

// Versão 5
symfony server:start
```

## Instalação do Annotations

Utilizado para declarar as rotas no arquivo

```
composer require annotations
```

No arquivo:

```
/**
* @Route("coloque_aqui_a_rota")
*/
```

## Intalação / Utilização do twig

O twig é uma biblioteca que gerencia os templates

```
composer req twig
```

Observação: Cria a pasta "templates" no diretório raiz.

Passando parâmetros/variaveis para a página.(HelloController.php)

```
return $this->render("diretorio/pagina.html.twig", [
            'variavel' => 'Passando uma variavel'
        ]);
```

Recebendo os parâmetros.(diretorio/pagina.html.twig)

```
<h1>{{ variavel }}</h1>
```

## Intalação / Utilização do Doctrine | maker |

O doctrime é uma biblioteca que gerencia e mapeia o banco de dados.

O maker cria arquivos via terminal

```
composer req doctrine maker
```

Criar o banco de dados

```
// Instalar o drive do postgres
sudo apt install php-pgsql

// Mapear a conecção no arquivo .env
DATABASE_URL="postgresql://meulogin:minhasenha@127.0.0.1:5432/nomedobanco?serverVersion=13&charset=utf8"

// Criar o banco de dados
php bin/console doctrine:database:create
```

Criar o arquivo tipo entity usando o comando make

```
php bin/console make:entity nomedatabela
```

Criar as migrations

```
php bin/console doctrine:migrations:diff
```

Criar a tabela no banco de dados

```
php bin/console doctrine:migrations:migrate
```

## Intalação / Utilização do Form | Validator |

Classe form é responsavel por criar formulários no symfony e a validator valida os campos.

```
composer req form validator
```

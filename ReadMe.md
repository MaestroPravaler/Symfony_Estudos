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

## Intalação do twig

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

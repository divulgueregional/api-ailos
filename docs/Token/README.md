# TOKEN-AILOS

## Authorization Homologação

- HOMOLOGAÇÃO<br>
  Para gerar o token precisa "Authorization: Basic ", como não sabia aonde ter essa informação, peguei no devportal.<br>
  Entra na Minha aplicação, Sandbox Key, ao lado de Generate Access Token tem CURL TO GENERATE ACCESS TOKEN, clica em Copy to cliboard e cola em um bloco de notas<br>
  curl -k -X POST https://apiendpointhml.ailos.coop.br/token -d "grant_type=password&username=Username&password=Password" -H "Authorization: Basic XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"<br>
  Peguei o valor do Authorization e funcionou em Homologação.

## Gerar o token

Segue um exemplo de como gerar o token. Ainda em desenvolvimente, somente teste de desenvolvimento.

```php
    require '../../../vendor/autoload.php';

    use Divulgueregional\ApiAilos\Boletos;

    $config = [
        'producao' => 0, // 0- homologação, 1- produção
        $Authorization = '';// Authorization
    ];

    try {
        $ailos = new Boletos($config);

        $token = $ailos->gerarToken();
        print_r($token);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```

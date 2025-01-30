# TOKEN-AILOS

## Authorization Homologação

- HOMOLOGAÇÃO<br>
  Para gerar o token precisa "Authorization: Basic ", como não sabia aonde ter essa informação, peguei no devportal.<br>
  Entra na Minha aplicação, Sandbox Key, ao lado de Generate Access Token tem CURL TO GENERATE ACCESS TOKEN, clica em Copy to cliboard e cola em um bloco de notas<br>
  curl -k -X POST https://apiendpointhml.ailos.coop.br/token -d "grant_type=password&username=Username&password=Password" -H "Authorization: Basic XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"<br>
  Peguei o valor do Authorization e funcionou em Homologação.

## Erro Certificado

Ao gerar o token pode gerar erro ao ler o certificado por causa do SSL<br>
Leia o documento SSL Erro 60 que vai auxiliá-lo para uma solução.

```php
    require '../../../vendor/autoload.php';

    use Divulgueregional\ApiAilos\Boleto;

    $config = [
        'certificate' => '../cert/Inter_API_Certificado.crt',//local do certificado crt
        'certificateKey' => '../cert/Inter_API_Chave.key',//local do certificado key
    ];

    $client_id = '';//seu client_id
    $client_secret = '';//client_secret
    try {
        $bankingInter = new InterBanking($config);

        $token = $bankingInter->getToken($client_id, $client_secret);
        print_r($token);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```

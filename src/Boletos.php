<?php

namespace Divulgueregional\ApiAilos;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Boletos
{
    private $config;
    private $url;
    protected $client;
    protected $token;

    function __construct($config = [])
    {
        $this->config = $config;
        // print_r($this->config);

        $this->url = 'https://apiendpointhml.ailos.coop.br'; // Definindo URL para o ambiente de produção

        if ($this->config['producao'] == 0) {
            $this->url = 'https://apiendpointhml.ailos.coop.br'; // Definindo URL para o ambiente de homologação
        }

        $this->client = new Client([
            'base_uri' => $this->url,
        ]);
    }

    #################################################
    ###### TOKEN ####################################
    #################################################
    public function gerarToken()
    {
        try {
            $response = $this->client->request(
                'POST',
                'token',
                [
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Basic WHZMQ1ZGVlRIazlhMThQanFYNWowc3kwVktVYTpvWG90UEJKWm9ISmVOYmJ5Ym82YmJENUZBRmth'
                    ],
                    'form_params' => [
                        'grant_type' => 'client_credentials'
                    ],
                    //   'form_params' => json_encode($cobranca),
                ]
            );

            return (array) json_decode($response->getBody()->getContents());
        } catch (ClientException $e) {
            // return $this->parseResultClient($e);
            return $e;
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => $response];
        }
    }
}

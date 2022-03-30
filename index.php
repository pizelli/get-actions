<?php
require_once "vendor/autoload.php";

use GuzzleHttp\Client;

$url = 'https://www.infomoney.com.br/wp-admin/admin-ajax.php';

$headers = [
    'authority' => 'www.infomoney.com.br',
    'pragma' => 'no-cache',
    'cache-control' => 'no-cache',
    'sec-ch-ua' => '" Not A;Brand";v="99", "Chromium";v="98", "Google Chrome";v="98"',
    'dnt' => '1',
    'sec-ch-ua-mobile' => '?0',
    'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36',
    'content-type' => 'application/x-www-form-urlencoded; charset=UTF-8',
    'accept' => 'application/json, text/javascript, */*; q=0.01',
    'x-requested-with' => 'XMLHttpRequest',
    'sec-ch-ua-platform' => '"Linux"',
    'origin' => 'https://www.infomoney.com.br',
    'sec-fetch-site' => 'same-origin',
    'sec-fetch-mode' => 'cors',
    'sec-fetch-dest' => 'empty',
    'referer' => 'https://www.infomoney.com.br/ferramentas/altas-e-baixas/?type=acoes/',
    'accept-language' => 'pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
];

$data = [
    'action' => 'tool_altas_e_baixas',
    'pagination' => !empty($_GET['pg']) ? $_GET['pg'] : 1,
    'perPage' => 50,
    'altas_e_baixas_table_nonce' => '8e201fa7fb',
    'stock' => 2
];

$client = new Client(['headers' => $headers]);
$response = $client->post($url, ['form_params' => $data]);

echo $response->getBody()->getContents();

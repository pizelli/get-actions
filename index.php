<?php
require_once "vendor/autoload.php";

$client = new \GuzzleHttp\Client();

$url = 'https://www.infomoney.com.br/ferramentas/altas-e-baixas/?type=acoes/';

$request = new \GuzzleHttp\Psr7\Request('GET', $url);
$promise = $client->sendAsync($request)->then(function(\GuzzleHttp\Psr7\Response $res) {
    $body = $res->getBody();
    $doc = new DOMDocument();
    @$doc->loadHTML($body);
    $xpath = new DOMXPath($doc);

    /** @var DOMNodeList $titles */
    $titles = $xpath->evaluate('//*[@id="altas_e_baixas"]/tbody/tr/td[1]/a');
    $extractedTiles = [];

    /** @var DOMElement $title */
    foreach ($titles as $title) {
        $extractedTiles[] = utf8_decode($title->textContent);
    }

    var_dump($titles);
});

$promise->wait();


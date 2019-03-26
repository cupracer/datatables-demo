<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Demo;

require_once '../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/', function (Request $request, Response $response, array $args) {
    $demo = new Demo();
    $response->getBody()->write($demo->getPage());

    return $response;
});

$app->get('/json', function (Request $request, Response $response, array $args) {
    $demo = new Demo();
    $response->getBody()->write($demo->getJson());

    return $response;
});

try {
    $app->run();
}catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}

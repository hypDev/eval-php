<?php
use Slim\Http\Response as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/app.service.php';
require __DIR__ . '/../src/app.controller.php';
$app = AppFactory::create();

$controller = new AppController();

$app->get('/', function (Request $request, Response $response, array $args) use($controller) {
    return $response->write('Hello world. Try a different route.');
});
$app->get('/search/author/{title}', function (Request $request, Response $response, array $args) use($controller) {
    $res = $controller->find($args['title']);
    return $response->withJson($res);
});
$app->post('/create', function (Request $request, Response $response, array $args) use($controller) {
    $res = $controller->create($request->getParsedBody());
    return $response->withJson($res);
});
$app->post('/reset', function (Request $request, Response $response, array $args) use($controller) {
    $controller->reset();
    return $response->withJson(true);
});

$app->run();
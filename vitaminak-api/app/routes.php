<?php
declare(strict_types=1);

use App\Application\Actions\Food\ListFoodsAction;


use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $file = '../public_html/index.html';
        $response->getBody()->write(file_get_contents($file));
        return $response;
    
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/food', function (Group $group) {
        $group->get('', ListFoodsAction::class);
    });
};

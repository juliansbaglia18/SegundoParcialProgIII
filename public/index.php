<?php
// include './clases/usuario.php';

use App\Controllers\InscripcionController;
use \Firebase\JWT\JWT;
use Clases\Usuario;
use Clases\Token;
use Clases\Archivos;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy;
use Slim\Middleware\ErrorMiddleware;
use Slim\Exception\NotFoundException;

use App\Middlewares\RepetidoMiddleware;
use App\Middlewares\SoloAlumnoMiddleware;
use App\Middlewares\SoloAdminMiddleware;
use App\Middlewares\ExistenMiddleware;;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\JsonMiddleware;
use App\Controllers\UserController;
use App\Controllers\MateriaController;
use Config\Database;


require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath("/public");

new Database;
// $app->addRoutingMiddleware();



$app->group('/users', function (RouteCollectorProxy $group) {
    
    // $group->get('/{id}', UserController::class . ":getOne");
    
    // $group->get('[/]', UserController::class . ":getAll");
    
    $group->post('[/]', UserController::class . ":add")->add(new RepetidoMiddleware);
    
    // $group->put('/{id}', UserController::class . ":update");
    
    // $group->delete('/{id}', UserController::class . ":delete");
});
$app->group('/vehiculos', function (RouteCollectorProxy $group) {
    
    $group->get('/{patente}', VehiculoController::class . ":getOne");

    $group->get('[/]', VehiculoController::class . ":getAll");

    // $group->post('[/]', UserController2::class . ":add");
    
    // $group->put('/{id}', UserController2::class . ":update");

    // $group->delete('/{id}', UserController2::class . ":delete");

});
    $app->group('/login', function (RouteCollectorProxy $group) {
    
    // $group->post('/{patente}', VehiculoController::class . ":getOne");

    // $group->get('[/]', VehiculoController::class . ":getAll");

    $group->post('[/]', UserController::class . ":login")->add(new ExistenMiddleware);
    
    // $group->put('/{id}', UserController2::class . ":update");

    // $group->delete('/{id}', UserController2::class . ":delete");
});

$app->group('/materia', function (RouteCollectorProxy $group) {
        
    
    $group->post('[/]', MateriaController::class . ":add")->add(new SoloAdminMiddleware);
    
    // $group->put('/{id}', UserController::class . ":update");
    
    // $group->delete('/{id}', UserController::class . ":delete");
})->add(new AuthMiddleware);
$app->group('/inscripcion', function (RouteCollectorProxy $group) {
        
    $group->post('/{id}', InscripcionController::class . ":add")->add(new SoloAlumnoMiddleware);

})->add(new AuthMiddleware);

$app->add(new JsonMiddleware);

$app->run();
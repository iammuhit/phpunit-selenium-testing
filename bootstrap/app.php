<?php declare(strict_types=1);

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$container = new Container();
$container->set('view', function () {
    return Twig::create(dirname(__DIR__) . '/resources/views', [
        'cache' => dirname(__DIR__) . '/storage/views',
    ]);
});

$app = AppFactory::createFromContainer($container);
$app->add(TwigMiddleware::createFromContainer($app));

/**
 * Load Routes
 */
require dirname(__DIR__) . '/routes/web.php';

return $app;
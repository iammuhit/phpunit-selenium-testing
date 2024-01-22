<?php declare(strict_types=1);

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Slim\Views\Twig;

class BaseController
{
    protected ContainerInterface $app;
    protected Twig $view;

    public function __construct(ContainerInterface $container)
    {
        $this->app  = $container;
        $this->view = $this->app->get('view');
    }
}
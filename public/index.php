<?php declare(strict_types=1);

require dirname(__DIR__) . '/bootstrap/autoload.php';

/**
 * RUN THE APPLICATION
 */
$app = require_once dirname(__DIR__) . '/bootstrap/app.php';
$app->run();

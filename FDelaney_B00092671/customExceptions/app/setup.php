<?php


$app = new Silex\Application();

$app['debug'] = true;

$pathToTemplates = __DIR__ . '/../templates';
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => $pathToTemplates
]);

$app->register(new Silex\Provider\SessionServiceProvider());

return $app;
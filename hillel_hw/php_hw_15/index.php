<?php
declare(strict_types=1);

const APP_DIR = __DIR__ . '/';

require_once APP_DIR . 'services/Figure.php';
require_once APP_DIR . 'services/Rectangle.php';
require_once APP_DIR . 'services/Circle.php';
require_once APP_DIR . 'logger/LoggerFigure.php';

$logger = new LoggerFigure();

try {
    $rectangle = new Rectangle(20.1, 50.2);
    echo('getWidth $rectangle = ' . $rectangle->getWidth() . PHP_EOL);
    echo('getHeight $rectangle = ' . $rectangle->getHeight() . PHP_EOL);
    echo('getArea $rectangle = ');
    $rectangle->getArea();
    echo(PHP_EOL);
    echo('getPerimeter $rectangle = ');
    $rectangle->getPerimeter();
    echo(PHP_EOL);
    echo(PHP_EOL);

    $circle = new Circle(10.1);
    echo('getRadius $circle = ' . $circle->getRadius() . PHP_EOL);
    echo('getArea $circle = ');
    $circle->getArea();
    echo(PHP_EOL);
    echo('getPerimeter $circle = ');
    $circle->getPerimeter();
    echo(PHP_EOL);

} catch (Exception $exception) {
    $logger->error($exception->getMessage());
}

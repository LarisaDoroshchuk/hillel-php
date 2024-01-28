<?php
declare(strict_types=1);

const APP_DIR = __DIR__ . '/';

require_once APP_DIR . 'traits/Color.php';
require_once APP_DIR . 'services/Car.php';
require_once APP_DIR . 'services/Cat.php';
require_once APP_DIR . 'services/Flower.php';
require_once APP_DIR . 'logger/LoggerTrait.php';

$logger = new LoggerTrait();

try {
    $car = new Car('ford');
    $car->setSpeed(120);
    $car->setColor('red');
    echo('getModel $car = ' . $car->getModel() . PHP_EOL);
    echo('getSpeed $car = ' . $car->getSpeed() . PHP_EOL);
    echo('getColor $car = ' . $car->getColor() . PHP_EOL);
    echo(PHP_EOL);

    $cat = new Cat('Cleo', 'sphinx');
    $cat->setColor('grey');
    echo('getName $cat = ' . $cat->getName() . PHP_EOL);
    echo('getBreed $cat = ' . $cat->getBreed() . PHP_EOL);
    echo('getColor $cat = ' . $cat->getColor() . PHP_EOL);
    echo(PHP_EOL);

    $flower = new Flower('rose');
    $flower->setColor('orange');
    echo('getTypeFlower $flower = ' . $flower->getTypeFlower() . PHP_EOL);
    echo('getColor $flower = ' . $flower->getColor() . PHP_EOL);
    echo(PHP_EOL);

} catch (Exception $exception) {
    $logger->error($exception->getMessage());
}

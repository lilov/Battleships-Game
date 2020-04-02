<?php

require __DIR__ . '/vendor/autoload.php';

use Battleships\Controllers\WebController;
use Battleships\Controllers\ConsoleController;

session_start();
$gridSize = 10;

if (php_sapi_name() == 'cli') {
    $game = new ConsoleController($gridSize);
} else {
    $game = new WebController($gridSize);
}

$game->start();

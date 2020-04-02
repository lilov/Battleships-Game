<?php

namespace Battleships\Controllers;

use Battleships\Core\Game;
use Battleships\Views\ConsoleView;
use Battleships\Controllers\ControllerInterface;
use Battleships\Core\Renderers\SimpleBoardRenderer;

class ConsoleController implements ControllerInterface
{
    public function __construct($gridSize)
    {
        $this->game = new Game($gridSize, new SimpleBoardRenderer);
        $this->view = new ConsoleView();
    }

    public function start()
    {
        while (!$this->game->isGameOver()) {
            $this->game->play();
            $this->view->render($this->game->getOutputData());
            $this->game->setUserInput($this->getUserInput());
        }
    }

    public function getUserInput()
    {
        $handle = fopen("php://stdin", "r");
        $userInput = fgets($handle);
        fclose($handle);

        return $userInput;
    }
}

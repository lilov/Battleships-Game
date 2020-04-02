<?php

namespace Battleships\Controllers;

use Battleships\Core\Game;
use Battleships\Views\WebView;
use Battleships\Controllers\ControllerInterface;
use Battleships\Core\Renderers\SimpleBoardRenderer;

class WebController implements ControllerInterface
{
    public function __construct($gridSize)
    {
        $this->game = new Game($gridSize, new SimpleBoardRenderer);
        $this->view = new WebView();
    }

    public function start()
    {
        $this->game->setUserInput($this->getUserInput());
        $this->game->play();
        $this->view->render($this->game->getOutputData());
    }

    public function getUserInput()
    {
        return isset($_POST['coord']) ? $_POST['coord'] : '';
    }
}

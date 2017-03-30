<?php

namespace Kata;

/**
 * Class Game
 *
 * @package Kata
 **/
class Game
{
    /**
     * @var \Kata\Board
     */
    private $board;

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->board = new Board(4, 4);
    }

    public function run()
    {
        $newBoard = new Board($this->board->getWidth(), $this->board->getHeight());
        for ($i = 0; $i < $this->board->getWidth(); $i++) {
            for ($j = 0; $j < $this->board->getHeight(); $j++) {
                $createCell = $this->board->checkCell($i, $j);
                if ($createCell) {
                    $newBoard[$i][$j] = new Cell();
                }
            }
        }
        $this->board = $newBoard;
    }
}

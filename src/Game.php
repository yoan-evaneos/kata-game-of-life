<?php

namespace Kata;

/**
 * Class Game
 *
 * @package Kata
 **/
class Game
{
    /** @var \Kata\Board */
    private $board;

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->board = new Board(10);
        $this->board->createCell(2, 3, new Cell());
        $this->board->createCell(3, 3, new Cell());
        $this->board->createCell(4, 3, new Cell());
        $this->board->createCell(5, 3, new Cell());
        $this->board->createCell(4, 4, new Cell());
    }

    /**
     *
     */
    public function run()
    {
        $i = 0;
        while ($i < 10) {
            echo (string)$this->board;
            $this->board = $this->board->updateBoard();
            $i++;
        }
    }
}

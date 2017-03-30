<?php

namespace Kata\Test;

use Kata\Board;
use Kata\Cell;

/**
 * Class BoardTest
 *
 * @package Kata\Test
 **/
class BoardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function board_should_have_a_width_size()
    {
        $board = new Board(4);

        $this->assertEquals(4, $board->getSize());
    }

    /**
     * @test
     */
    public function board_should_return_no_cell_at_coordinates()
    {
        $board = new Board(10);

        $this->assertNull($board->getCellAt(3, 5));
    }

    /**
     * @test
     */
    public function should_return_next_state_of_cell()
    {
        $board = new Board(10);
        $board->createCell(2, 3, new Cell());
        $board->createCell(3, 3, new Cell());
        $board->createCell(4, 3, new Cell());
        $board->createCell(5, 3, new Cell());
        $board->createCell(4, 4, new Cell());

        $result = $board->getNextStateOfCellAt(3, 3);
        $this->assertEquals('alive', $result);

        $result = $board->getNextStateOfCellAt(5, 3);
        $this->assertEquals('stay', $result);

        $result = $board->getNextStateOfCellAt(2, 3);
        $this->assertEquals('dead', $result);
    }
}

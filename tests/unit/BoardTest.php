<?php

namespace Kata\Test;

use Kata\Board;

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
        $board = new Board();

        $this->assertEquals(4, $board->getWidth());
    }
}

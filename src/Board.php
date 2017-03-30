<?php

namespace Kata;

/**
 * Class Board
 *
 * @package Kata
 **/
class Board
{
    /** @var integer */
    private $size;
    /** @var array */
    private $cells;

    /**
     * Board constructor.
     *
     * @param $size
     */
    public function __construct($size)
    {
        $this->size = $size;
        $this->cells = [];
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param $int
     * @param $int1
     *
     * @return Cell|null
     */
    public function getCellAt($int, $int1)
    {
        if (isset($this->cells[$int][$int1])) {
            return $this->cells[$int][$int1];
        }
        return null;
    }

    /**
     * @param $x
     * @param $y
     * @param Cell $cell
     */
    public function createCell($x, $y, $cell)
    {
        $this->cells[$x][$y] = $cell;
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @return int
     */
    public function countNeighboursAt($x, $y)
    {
        $count = 0;
        for ($i = $x - 1; $i <= $x + 1; $i++) {
            for ($j = $y - 1; $j <= $y + 1; $j++) {
                if (($i !== $x || $j !== $y) && $this->getCellAt($i, $j) !== null) {
                    $count++;
                }
            }
        }
        return $count;
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @return string
     */
    public function getNextStateOfCellAt($x, $y)
    {
        $countNeighboursAt = $this->countNeighboursAt($x, $y);

        if ($countNeighboursAt < 2 || $countNeighboursAt > 3) {
            return 'dead';
        }
        if ($countNeighboursAt === 2) {
            return 'stay';
        }
        if ($countNeighboursAt === 3) {
            return 'alive';
        }
    }
}

<?php

namespace Kata;

/**
 * Class Board
 *
 * @package Kata
 **/
class Board
{
    const DEAD = 'dead';
    const STAY = 'stay';
    const ALIVE = 'alive';
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
     * @param $x
     * @param $y
     *
     * @return Cell|null
     */
    public function getCellAt($x, $y)
    {
        if (isset($this->cells[$x][$y])) {
            return $this->cells[$x][$y];
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
            return self::DEAD;
        }
        if ($countNeighboursAt === 2) {
            return self::STAY;
        }
        if ($countNeighboursAt === 3) {
            return self::ALIVE;
        }
    }

    /**
     * @return \Kata\Board
     */
    public function updateBoard()
    {
        $newBoard = new Board($this->size);
        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                $nextStateOfCellAt = $this->getNextStateOfCellAt($i, $j);
                if ($nextStateOfCellAt === self::ALIVE ||
                    $nextStateOfCellAt === self::STAY && $this->getCellAt($i, $j) !== null
                ) {
                    $newBoard->createCell($i, $j, new Cell());
                }
            }
        }
        return $newBoard;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $result = '--------------';
        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                $result .= $this->getCellAt($i, $j) !== null ? 'o' : ' ';
            }
            $result .= PHP_EOL;
        }
        $result .= '--------------'.PHP_EOL;
        return $result;
    }
}

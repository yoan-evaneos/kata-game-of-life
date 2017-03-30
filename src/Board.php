<?php

namespace Kata;

/**
 * Class Board
 *
 * @package Kata
 **/
class Board
{
    private $width;

    private $height;

    private $cells;

    /**
     * Board constructor.
     *
     * @param int $width
     * @param int $height
     */
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->cells = [];
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return array
     */
    public function getCells()
    {
        return $this->cells;
    }

    public function checkCell($x, $y)
    {
        // Kill or stay
        if (isset($this->cells[$x][$y])) {
            $countCells = 0;
            $minX= min(0, $x-3);
            $minY = min(0, $y-3);
            $maxX = max($this->width, $x+3);
            $maxY = max($this->height, $y+3);
            for ($i = $minX; $i <= $maxX; $i++) {
                for($j = $minY; $j <= $maxY; $j++) {
                    if (isset($this->cells[$i][$j])) {
                        $countCells++;
                    }
                }
            }
            return $countCells;
        }
        // Create or stay
        else {

        }
    }
}

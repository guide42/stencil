<?php

namespace Stencil\Terminal;

/**
 * 2D dimensions for terminal size.
 */
class TerminalSize
{
    protected $rows;
    protected $cols;

    public function __construct($rows, $cols)
    {
        $this->rows = $rows;
        $this->cols = $cols;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function getCols()
    {
        return $this->cols;
    }
}
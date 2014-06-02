<?php

namespace Stencil\Terminal;

trait OutputTerminal
{
    /**
     * Insert a char in the cursor position.
     *
     * @param integer $char
     */
    abstract public function writeChar($char);
}
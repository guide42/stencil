<?php

namespace Stencil\Terminal;

/**
 * Base interface for all terminals implementations.
 */
interface Terminal
{
    /**
     * Initialize the interface and (if required) enters private mode.
     */
    public function init();

    /**
     * Finish the interface.
     *
     * This should close the private mode if active and restore the state
     * before using this interface.
     */
    public function end();

    /**
     * Retrieve terminal's name.
     *
     * @return string
     */
    public function getName();

    /**
     * True is the terminal can print in colors.
     *
     * @return boolean
     */
    public function hasColors();

    /**
     * Retrieve the terminal size.
     *
     * @return \Stencil\Terminal\TerminalSize
     */
    public function getSize();

    /**
     * Retrieve the cursor position.
     *
     * @returns \Stencil\Terminal\TerminalPosition
     */
    public function getCursor();

    /**
     * Move the cursor to a new position.
     *
     * @param \Stencil\Terminal\TerminalPosition $position
     */
    public function setCursor(TerminalPosition $position);

    /**
     * Insert a char in the cursor position.
     *
     * @param integer $char
     */
    public function writeChar($char);

    /**
     * Clear the terminal.
     *
     * This normally means that the screen will be repainted in the next
     * iteration.
     */
    public function clear();

    /**
     * Refresh the terminal.
     */
    public function refresh();
}
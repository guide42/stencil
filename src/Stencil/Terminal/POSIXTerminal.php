<?php

namespace Stencil\Terminal;

/**
 * Base interface for POSIX terminals.
 */
interface POSIXTerminal
{
    /**
     * Enable or disable echo mode.
     *
     * @param boolean $state
     */
    public function echoMode($state);

    /**
     * Enable or disable raw mode.
     *
     * @param boolean $state
     */
    public function rawMode($state);
}
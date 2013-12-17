<?php

namespace Stencil\Terminal;

/**
 * Creates a Terminal depending on the system.
 */
class TerminalFacade
{
    public static function create()
    {
        if (function_exists('ncurses_init')) {
            return new NcursesTerminal();
        }

        throw new \RuntimeException('TODO');
    }
}

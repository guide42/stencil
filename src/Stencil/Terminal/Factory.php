<?php

namespace Stencil\Terminal;

/**
 * Convenience factory. It tries to pick the best available implementation.
 */
class Factory
{
    /**
     * Creates a Terminal depending on the system.
     *
     * @return \Stencil\Terminal\Terminal
     */
    public static function create()
    {
        if (function_exists('ncurses_init')) {
            return new NcursesTerminal();
        }

        throw new \RuntimeException('TODO');
    }
}

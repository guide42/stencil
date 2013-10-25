<?php

namespace Stencil\Terminal\Input;

/**
 * Base Profile with convenient methods.
 */
abstract class BaseProfile implements Profile
{
    /**
     * Creates a new SpecialKey Pattern.
     *
     * @param integer      $kind
     * @param string|array $pattern
     *
     * @return \Stencil\Terminal\Input\KeyPattern
     */
    protected function createSpecialKey($kind, $pattern)
    {
        return new KeyPattern(new SpecialKey($kind), $pattern);
    }

    /**
     * Creates a new ArrowKey Pattern.
     *
     * @param integer      $direction
     * @param string|array $pattern
     *
     * @return \Stencil\Terminal\Input\KeyPattern
     */
    protected function createArrowKey($direction, $pattern)
    {
        return new KeyPattern(new ArrowKey($direction), $pattern);
    }
}
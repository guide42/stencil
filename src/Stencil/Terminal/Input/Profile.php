<?php

namespace Stencil\Terminal\Input;

/**
 * Regroup Patterns.
 */
interface Profile
{
    /**
     * Return a list of Patterns.
     *
     * @return array
     */
    public function getPatterns();
}
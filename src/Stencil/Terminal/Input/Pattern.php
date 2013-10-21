<?php

namespace Stencil\Terminal\Input;

/**
 * Input Pattern.
 */
interface Pattern
{
    /**
     * Retrieve the matcher for the given codes.
     *
     * @param array $codes
     *
     * @return \Stencil\Terminal\Input\Matcher
     */
    public function matcher(array $codes);
}
<?php

namespace Stencil\Terminal\Input;

/**
 * Pattern for normal characters.
 */
class CharacterPattern implements Pattern
{
    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Input\Pattern::matcher()
     */
    public function matcher(array $codes)
    {
        $matcher = new CharacterMatcher();
        $matcher->setCodes($codes);

        return $matcher;
    }
}
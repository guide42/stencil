<?php

namespace Stencil\Terminal\Input;

class CommonProfile implements Profile
{
    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Input\Profile::getPatterns()
     */
    public function getPatterns()
    {
        return array(
            new CharacterPattern(),
        );
    }
}
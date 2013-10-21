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
            new KeyPattern(new ArrowKey(ArrowKey::DIR_UP), array(27, 91, 65)),
            new KeyPattern(new ArrowKey(ArrowKey::DIR_DOWN), array(27, 91, 66)),
            new KeyPattern(new ArrowKey(ArrowKey::DIR_RIGHT), array(27, 91, 67)),
            new KeyPattern(new ArrowKey(ArrowKey::DIR_LEFT), array(27, 91, 68)),

            new CharacterPattern(),
        );
    }
}
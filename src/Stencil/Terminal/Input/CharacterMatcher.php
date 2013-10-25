<?php

namespace Stencil\Terminal\Input;

/**
 * Pattern Matcher for normal characters.
 */
class CharacterMatcher extends BaseMatcher
{
    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Input\BaseMatcher::match()
     */
    public function match()
    {
        $this->setMatched(false);

        $codes = $this->getCodes();
        $code = $codes[0];

        if ($code >= 32 && $code <= 126) {
            $this->setMatched(true);
            $this->addInput(new Key(chr($code)));
            $this->addRemainingCodes(array_slice($codes, 1));

            return;
        }

        // TODO: Check Multibyte Strings
    }
}
<?php

namespace Stencil\Terminal\Input;

/**
 * Generic Key Pattern Matcher.
 */
class KeyMatcher extends BaseMatcher
{
    /**
     * The Key Pattern to be matched.
     *
     * @var \Stencil\Terminal\Input\KeyPattern
     */
    protected $pattern;

    /**
     * @param \Stencil\Terminal\Input\KeyPattern $pattern
     */
    public function __construct(KeyPattern $pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Input\BaseMatcher::match()
     */
    public function match()
    {
        $this->setMatched(false);

        $patternCodes = $this->pattern->getCodes();
        $patternCodesCount = count($patternCodes);

        if (count($this->codes) < $patternCodesCount) {
            return;
        }

        for ($i = 0; $i < $patternCodesCount; $i++) {
            if ($patternCodes[$i] !== $this->codes[$i]) {
                return;
            }
        }

        $this->setMatched(true);
        $this->addInput($this->pattern->getKey());
        $this->addRemainingCodes(array_slice($this->codes, $patternCodesCount));
    }
}
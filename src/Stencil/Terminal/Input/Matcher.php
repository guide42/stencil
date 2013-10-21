<?php

namespace Stencil\Terminal\Input;

/**
 * Input Pattern Matcher.
 */
interface Matcher
{
    /**
     * Return true if the pattern match. False otherwise.
     *
     * @return boolean
     */
    public function matches();

    /**
     * Assign the key codes to be matched.
     *
     * @param array $codes
     */
    public function setCodes(array $codes);

    /**
     * Return the remaining key codes.
     *
     * @return array
     */
    public function getRemainingCodes();

    /**
     * Return a list of input.
     *
     * @return array
     */
    public function getInput();
}
<?php

namespace Stencil\Terminal\Input;

/**
 * Base Input Pattern Matcher.
 */
abstract class BaseMatcher implements Matcher
{
    protected $codes;
    protected $matched;
    protected $input = array();
    protected $remainingCodes = array();

    /**
     * The actual match happened here.
     */
    abstract protected function match();

    /**
     * Set the state for matched.
     *
     * @param boolean $state
     */
    protected function setMatched($state)
    {
        $this->matched = !!$state;
    }

    /**
     * Add one input to the list that will be returned.
     *
     * @param mixed $input
     */
    protected function addInput($input)
    {
        $this->input[] = $input;
    }

    /**
     * Add a key code to the remaining list.
     *
     * @param integer $code
     */
    protected function addRemainingCode($code)
    {
        $this->remainingCodes[] = $code;
    }

    /**
     * Add a list of key codes to the remaining.
     *
     * @param array $codes
     */
    protected function addRemainingCodes(array $codes)
    {
        $this->remainingCodes += $codes;
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Input\Matcher::matches()
     */
    public function matches()
    {
        if ($this->matched === null) {
            $this->match();
        }

        return $this->matched;
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Input\Matcher::setCodes()
     */
    public function setCodes(array $codes)
    {
        $this->codes = $codes;
    }

    /**
     * Retrieve the key codes.
     *
     * @return array
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Input\Matcher::getRemainingCodes()
     */
    public function getRemainingCodes()
    {
        if ($this->matched === null) {
            $this->match();
        }

        return $this->remainingCodes;
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Input\Matcher::getInput()
     */
    public function getInput()
    {
        if ($this->matched === null) {
            $this->match();
        }

        return $this->input;
    }
}
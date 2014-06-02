<?php

namespace Stencil\Terminal;

/**
 * Will decorate the input of the terminal and generate a common input.
 */
trait InputTerminal
{
    /**
     * List of patterns.
     *
     * @var array
     */
    protected $patterns = array();

    /**
     * Add a new pattern to match the input.
     *
     * @param \Stencil\Terminal\Input\Pattern $pattern
     */
    public function addPattern(Input\Pattern $pattern)
    {
        $this->patterns[] = $pattern;
    }

    /**
     * Add all patterns from a profile.
     *
     * @param \Stencil\Terminal\Input\Profile $profile
     */
    public function addProfile(Input\Profile $profile)
    {
        foreach ($profile->getPatterns() as $pattern) {
            $this->addPattern($pattern);
        }
    }

    /**
     * Read input from Terminal and process it through the given patterns.
     *
     * @return array
     */
    public function readInput()
    {
        $chars = array();
        $char = $this->readChar();

        while ($char > 0) {
            $chars[] = $char;
            $char = $this->readChar(1);
        }

        // There is no input.
        if (count($chars) === 0) {
            return array();
        }

        $keys = array();

        do {
            $matches = false;

            foreach ($this->patterns as $pattern) {
                $matcher = $pattern->matcher($chars);

                if ($matcher->matches()) {
                    $keys += $matcher->getInput();
                    $chars = $matcher->getRemainingCodes();

                    // Finish checking all chars.
                    // What I'm still doing here?
                    if (count($chars) === 0) {
                        break 2;
                    }

                    $matches = true;
                }
            }
        } while ($matches);

        // XXX If $chars is not empty, that means that there weren't pattern to
        //     convert them into common input.
        //var_dump($chars, $keys);

        return $keys;
    }

    /**
     * Read a char from terminal.
     *
     * @param null|integer $timeout
     *
     * @return integer
     */
    abstract public function readChar($timeout = null);
}
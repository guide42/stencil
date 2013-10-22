<?php

namespace Stencil\Terminal\Input;

/**
 * Generic Key Pattern.
 */
class KeyPattern implements Pattern
{
    /**
     * The result Key.
     *
     * @var \Stencil\Terminal\Input\Key
     */
    protected $key;

    /**
     * The pattern codes.
     *
     * @var array
     */
    protected $codes;

    /**
     * @param \Stencil\Terminal\Input\Key $key
     * @param array|string $codes
     */
    public function __construct(Key $key, $codes)
    {
        if (is_string($codes)) {
            $codes = array_map('ord', str_split($codes));
        }

        $this->key = $key;
        $this->codes = $codes;
    }

    /**
     * Retrieve the result Key.
     *
     * @return \Stencil\Terminal\Input\Key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Retrieve the pattern codes.
     *
     * @return array
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Input\Pattern::matcher()
     */
    public function matcher(array $codes)
    {
        $matcher = new KeyMatcher($this);
        $matcher->setCodes($codes);

        return $matcher;
    }
}
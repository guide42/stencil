<?php

namespace Stencil\Terminal\Input;

/**
 * Generic type of Key for Terminal Input.
 */
class Key
{
    /**
     * String representation of the Key pressed.
     *
     * @var string
     */
    protected $repr;

    /**
     * @param string $repr
     */
    public function __construct($repr)
    {
        $this->repr = $repr;
    }

    public function __toString()
    {
        return $this->repr;
    }
}
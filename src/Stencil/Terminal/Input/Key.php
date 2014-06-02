<?php

namespace Stencil\Terminal\Input;

/**
 * Generic type of Key for Terminal Input.
 */
class Key
{
    const MOD_ALT  = 1;
    const MOD_CTRL = 2;
    const MOD_META = 4;

    /**
     * String representation of the Key pressed.
     *
     * @var string
     */
    public $repr;

    /**
     * Modifiers bitmask for the Key.
     *
     * @var integer
     */
    public $modifiers;

    /**
     * @param string $repr
     */
    public function __construct($repr, $modifiers = 0)
    {
        $this->repr = $repr;
        $this->modifiers = $modifiers;
    }

    /**
     * Return true if ALT key is pressed. False otherwise.
     *
     * @return boolean
     */
    public function isAltPressed()
    {
        return $this->modifiers & self::MOD_ALT !== 0;
    }

    /**
     * Return true if CTRL key is pressed. False otherwise.
     *
     * @return boolean
     */
    public function isCtrlPressed()
    {
        return $this->modifiers & self::MOD_CTRL !== 0;
    }

    /**
     * Return true if META key is pressed. False otherwise.
     *
     * @return boolean
     */
    public function isMetaPressed()
    {
        return $this->modifiers & self::MOD_META !== 0;
    }

    public function __toString()
    {
        return sprintf('<%s(%s%s%s%s)>', get_class($this),
            $this->isMetaPressed() ? 'meta+' : '',
            $this->isCtrlPressed() ? 'ctrl+' : '',
            $this->isAltPressed() ? 'alt+' : '',
            $this->repr);
    }
}
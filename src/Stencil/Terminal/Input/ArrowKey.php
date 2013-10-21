<?php

namespace Stencil\Terminal\Input;

/**
 * Arrow Key.
 */
class ArrowKey extends Key
{
    const DIR_UP    = 0;
    const DIR_DOWN  = 1;
    const DIR_RIGHT = 2;
    const DIR_LEFT  = 3;

    public static $directions = array(
        self::DIR_UP    => 'up',
        self::DIR_RIGHT => 'right',
        self::DIR_DOWN  => 'bottom',
        self::DIR_LEFT  => 'left',
    );

    /**
     * One of the ArrowKey::DIR_* constants.
     *
     * @var integer
     */
    protected $direction;

    /**
     * @param integer $direction
     */
    public function __construct($direction)
    {
        $this->direction = $direction;

        parent::__construct(
            $this->getDirectionName()
        );
    }

    /**
     * Retrieve the direction code.
     *
     * @return integer
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Retrieve the direction name.
     *
     * @return string
     */
    public function getDirectionName()
    {
        return self::$directions[$this->direction];
    }
}
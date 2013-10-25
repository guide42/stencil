<?php

namespace Stencil\Terminal\Input;

/**
 * Special Key.
 */
class SpecialKey extends Key
{
    const KIND_BACKSPACE   = 0;
    const KIND_TAB         = 1;
    const KIND_ENTER       = 2;
    const KIND_END         = 3;
    const KIND_HOME        = 4;
    const KIND_INSERT      = 5;
    const KIND_DEL         = 6;
    const KIND_PAGEUP      = 7;
    const KIND_PAGEDOWN    = 8;
    const KIND_REVERSE_TAB = 9;

    public static $kinds = array(
        self::KIND_BACKSPACE   => 'backspace',
        self::KIND_TAB         => 'tab',
        self::KIND_ENTER       => 'enter',
        self::KIND_END         => 'end',
        self::KIND_HOME        => 'home',
        self::KIND_INSERT      => 'insert',
        self::KIND_DEL         => 'delete',
        self::KIND_PAGEUP      => 'page up',
        self::KIND_PAGEDOWN    => 'page down',
        self::KIND_REVERSE_TAB => 'reverse tab',
    );

    /**
     * One of the SpecialKey::KIND_* constants.
     *
     * @var integer
     */
    protected $kind;

    /**
     * @param integer $kind
     */
    public function __construct($kind)
    {
        $this->kind = $kind;

        parent::__construct(
            $this->getKindName()
        );
    }

    /**
     * Retrieve the kind code.
     *
     * @return integer
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Retrieve the kind name.
     *
     * @return string
     */
    public function getKindName()
    {
        return self::$kinds[$this->kind];
    }
}
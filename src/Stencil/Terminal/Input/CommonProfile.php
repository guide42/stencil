<?php

namespace Stencil\Terminal\Input;

/**
 * Profile for Common ANSI Escape Sequences.
 */
class CommonProfile extends BaseProfile
{
    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Input\Profile::getPatterns()
     */
    public function getPatterns()
    {
        return array(
            $this->createSpecialKey(SpecialKey::KIND_BACKSPACE, "\x08"),
            $this->createSpecialKey(SpecialKey::KIND_TAB, "\t"),
            $this->createSpecialKey(SpecialKey::KIND_ENTER, "\n"),
            $this->createSpecialKey(SpecialKey::KIND_ENTER, "\r"),

            $this->createArrowKey(ArrowKey::DIR_UP, "\e[A"),
            $this->createArrowKey(ArrowKey::DIR_DOWN, "\e[B"),
            $this->createArrowKey(ArrowKey::DIR_RIGHT, "\e[C"),
            $this->createArrowKey(ArrowKey::DIR_LEFT, "\e[D"),

            $this->createSpecialKey(SpecialKey::KIND_END, "\e[F"),
            $this->createSpecialKey(SpecialKey::KIND_HOME, "\e[H"),
            $this->createSpecialKey(SpecialKey::KIND_INSERT, "\e[2~"),
            $this->createSpecialKey(SpecialKey::KIND_DEL, "\e[3"),
            $this->createSpecialKey(SpecialKey::KIND_PAGEUP, "\e[5~"),
            $this->createSpecialKey(SpecialKey::KIND_PAGEDOWN, "\e[6~"),
            $this->createSpecialKey(SpecialKey::KIND_REVERSE_TAB, "\e[Z"),

            new CharacterPattern(),
        );
    }
}
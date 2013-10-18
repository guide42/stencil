<?php

namespace Stencil\Terminal;

/**
 * The Ncurses Terminal implementation.
 */
class NcursesTerminal implements Terminal
{
    protected $hasColors = false;

    public function __construct()
    {
        if (!function_exists('ncurses_init')) {
            trigger_error('Ncurses library not present', E_USER_ERROR);
        }
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::init()
     */
    public function init()
    {
        ncurses_init();

        $this->hasColors = ncurses_has_colors();
        if ($this->hasColors) {
            ncurses_start_color();
            ncurses_use_default_colors();
        }

        ncurses_nonl();
        ncurses_noecho();
        ncurses_cbreak();
        ncurses_meta(STDSCR, 1);
        ncurses_keypad(STDSCR, 0);
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::end()
     */
    public function end()
    {
        ncurses_nocbreak();
        ncurses_echo();
        ncurses_nl();

        ncurses_end();
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::getName()
     */
    public function getName()
    {
        return ncurses_longname();
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::hasColors()
     */
    public function hasColors()
    {
        $this->hasColors;
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::getSize()
     */
    public function getSize()
    {
        ncurses_getmaxyx(STDSCR, $rows, $cols);
        return new TerminalSize($rows, $cols);
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::getCursor()
     */
    public function getCursor()
    {
        ncurses_getyx(STDSCR, $y, $x);
        return new TerminalPosition($x, $y);
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::setCursor()
     */
    public function setCursor(TerminalPosition $position)
    {
        ncurses_move($position->getY(), $position->getX());
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::putChar()
     */
    public function writeChar($char)
    {
        ncurses_waddch(STDSCR, $char);
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::readChar()
     */
    public function readChar()
    {
        return ncurses_wgetch(STDSCR);
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::clear()
     */
    public function clear()
    {
        ncurses_wclear(STDSCR);
    }

    /**
     * (non-PHPdoc)
     * @see \Stencil\Terminal\Terminal::refresh()
     */
    public function refresh()
    {
        ncurses_wrefresh(STDSCR);
        ncurses_doupdate();
    }
}
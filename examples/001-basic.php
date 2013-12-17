<?php
/*!
 * 001 Basic
 *
 * Will create a terminal in private mode and wait for a second before ending.
 */

require_once __DIR__ . '/../vendor/autoload.php';

$terminal = \Stencil\Terminal\TerminalFacade::create();
$terminal->init();

sleep(1);

$terminal->end();

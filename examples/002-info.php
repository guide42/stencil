<?php
/*!
 * 002 Information
 *
 * Creates a terminal and show all information.
 */

require_once __DIR__ . '/../vendor/autoload.php';

$terminal = \Stencil\Terminal\TerminalFacade::create();
//$terminal->init();
//$terminal->end();

printf("%-20s %s\n", 'Name', $terminal->getName());
printf("%-20s %s\n", 'Colors', $terminal->hasColors() ? 'yes' : 'no');
printf("%-20s %d cols; %d rows\n", 'Size', $terminal->getSize()->getCols(), $terminal->getSize()->getRows());

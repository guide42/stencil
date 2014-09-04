<?php
/*!
 * 002 Loop
 *
 * A basic event loop.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Stencil\Terminal\Factory;
use Stencil\Terminal\Terminal;
use Stencil\Terminal\Input\SpecialKey;

$terminal = Factory::create();
$terminal->init();

while (true) {
    $keys = $terminal->readInput();

    foreach ($keys as $key) {
        if ($key->repr === 'q') {
            break 2;
        }

        write($terminal, $key->repr);
    }
}

$terminal->end();

function write(Terminal $terminal, $input)
{
    $length = is_array($input) ? count($input) : strlen($input);
    for ($i = 0; $i < $length; $i++) {
        $terminal->writeChar(ord($input[$i]));
    }
}

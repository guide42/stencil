<?php
/*!
 * 002 Loop
 *
 * A basic event loop.
 */

require_once __DIR__ . '/../vendor/autoload.php';

$terminal = \Stencil\Terminal\Factory::create();
$terminal->init();

$write = false;

while (true) {
    $keys = $terminal->readInput();

    foreach ($keys as $key) {
        if ($key instanceof \Stencil\Terminal\Input\SpecialKey &&
            $key->kind === \Stencil\Terminal\Input\SpecialKey::KIND_INSERT) {
            $write = !$write;
        }

        if (!$write && $key->repr === 'q') {
            break 2;
        }

        if ($write) {
            for ($i = 0, $l = strlen($key->repr); $i < $l; $i++) {
                $terminal->writeChar(ord($key->repr[$i]));
            }
        }
    }
}

$terminal->end();

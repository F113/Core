<?php
// remove this line
Core::warning('Edit ' . __FILE__);

// using model example
$ex = new Example();
Core::warning('First result: ' . print_r($ex->test(), true));
<?php

/*
 * CWF-PHP Example Application
 * 
 * File: src/Public/index.php
 * Description: Main index file
 * Author: Michal Bocian <bocian.michal@outlook.com>
 * License: 3-Clause BSD
 */

require_once __DIR__ . "/../../vendor/autoload.php";

use CwfPhp\CwfPhp\Exceptions\Router_Exception;
use CwfPhp\CwfPhp\Framework;
use CwfPhp\CwfPhp\Router;
use CwfPhp\CwfPhp\View;

Framework::Setup(__DIR__ . "/..");

try {
    // parse route and execute it
    new Router($_SERVER["PATH_INFO"] ?? null)->Execute();
} catch (Router_Exception $ex) {
    // action, when controller/action is not found
    echo new View("Error")
            ->Bind("type", "404 - Page not found")
            ->Bind("error", $ex->getMessage());
} catch (Throwable $ex) {
    // action for other errors
    echo new View("Error")
            ->Bind("type", "Internal error (" . $ex::class . ")")
            ->Bind("error", $ex->getMessage() . "<br />" . $ex->getTraceAsString());
}

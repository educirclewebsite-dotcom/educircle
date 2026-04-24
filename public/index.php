<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Dynamic Subdirectory Fix
// This automatically detects if the app is running in a subdirectory and adjusts REQUEST_URI
$scriptPath = dirname($_SERVER['SCRIPT_NAME']); // e.g., /edu_circle/public
if ($scriptPath !== '/' && $scriptPath !== '\\') {
    // Check if REQUEST_URI starts with the directory of the script
    // We try both the full script path (public) and the parent (project root)

    // Case 1: Standard rewriting where REQUEST_URI includes the project root path
    // e.g. URI: /edu_circle/foo  Script: /edu_circle/public/index.php
    $projectRoot = dirname($scriptPath); // /edu_circle

    if (strpos($_SERVER['REQUEST_URI'], $projectRoot) === 0) {
        $newUri = substr($_SERVER['REQUEST_URI'], strlen($projectRoot));
        if ($newUri === '' || $newUri === false) {
            $newUri = '/';
        }
        $_SERVER['REQUEST_URI'] = $newUri;
    }
}

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);

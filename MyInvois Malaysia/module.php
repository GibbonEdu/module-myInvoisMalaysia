<?php
/*
Gibbon: Course Selection & Timetabling Engine
Copyright (C) 2017, Sandra Kuipers
*/

// Include the Composer autoloader
$autoloader = require __DIR__ . '/vendor/autoload.php';

// Module Functions
require_once __DIR__ . '/moduleFunctions.php';

// Register the core services as instances
$container->share('Gibbon\Contracts\Database\Connection', $pdo);
$container->share('Gibbon\session', $gibbon->session);
$container->add('pdo', $pdo, true);

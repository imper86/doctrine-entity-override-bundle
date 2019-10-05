<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

if (!file_exists($file = __DIR__.'/../../vendor/autoload.php')) {
    throw new \RuntimeException('Install the dependencies to run the test suite.');
}

$loader = require $file;
require_once __DIR__.'/app/AppKernel.php';
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

<?php

declare(strict_types=1);

use Utils\Rector\Rector\UseRequestRequestGetRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([__DIR__ . '/app'])
    ->withRules([
        UseRequestRequestGetRector::class,
    ]);

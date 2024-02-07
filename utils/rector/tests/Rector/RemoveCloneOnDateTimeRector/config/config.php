<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Utils\Rector\Rector\RemoveCloneOnDateTimeRector;

return RectorConfig::configure()
    ->withRules([RemoveCloneOnDateTimeRector::class]);

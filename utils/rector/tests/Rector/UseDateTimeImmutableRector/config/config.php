<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Utils\Rector\Rector\UseDateTimeImmutableRector;

return RectorConfig::configure()
    ->withRules([UseDateTimeImmutableRector::class])
    ->withImportNames(removeUnusedImports: true);

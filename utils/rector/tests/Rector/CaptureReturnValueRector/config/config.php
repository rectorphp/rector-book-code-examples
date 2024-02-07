<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Utils\Rector\Rector\CaptureReturnValueRector;
use Utils\Rector\Tests\Rector\CaptureReturnValueRector\Source\ClassWithNonFluentMethodCall;

// crop-start
return RectorConfig::configure()
    ->withConfiguredRule(CaptureReturnValueRector::class, [
        [DateTime::class, 'modify'],
        [ClassWithNonFluentMethodCall::class, 'modify'],
    ]);
// crop-end

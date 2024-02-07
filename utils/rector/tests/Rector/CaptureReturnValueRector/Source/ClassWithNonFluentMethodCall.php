<?php

declare(strict_types=1);

namespace Utils\Rector\Tests\Rector\CaptureReturnValueRector\Source;

final class ClassWithNonFluentMethodCall
{
    public function modify(): SomeOtherClass
    {
        return new SomeOtherClass();
    }
}

<?php

use Utils\Rector\Tests\Rector\CaptureReturnValueRector\Source\ClassWithNonFluentMethodCall;

$object = new ClassWithNonFluentMethodCall();
$object->modify();

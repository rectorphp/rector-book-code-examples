<?php

declare(strict_types=1);

namespace Utils\Rector\Tests\Rector\CaptureReturnValueRector;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class CaptureReturnValueRectorTest extends AbstractRectorTestCase
{
    #[DataProvider('provideData')]
    public function test(string $file): void
    {
        $this->doTestFile($file);
    }

    public static function provideData(): Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/config.php';
    }
}

<?php

namespace Utils\Rector\Tests\Rector\UseDateTimeImmutableRector\Fixture;

use DateTime;

final class ClassWithDateTimeParameter
{
    public function __construct(DateTime $parameter)
    {
    }
}
?>
-----
<?php

namespace Utils\Rector\Tests\Rector\UseDateTimeImmutableRector\Fixture;

use DateTimeImmutable;

final class ClassWithDateTimeParameter
{
    public function __construct(DateTimeImmutable $parameter)
    {
    }
}
?>

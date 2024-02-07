<?php

declare(strict_types=1);

namespace Utils\Rector\Rector;

use DateTime;
use PhpParser\Node;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Param;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class UseDateTimeImmutableRector extends AbstractRector
{
    // crop-start

    /**
     * @param Param $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $node->type instanceof Name) {
            return null;
        }

        if (! $this->isName($node->type, DateTime::class)) {
            return null;
        }

        $node->type = new FullyQualified('DateTimeImmutable');
        return $node;
    }

    // crop-end

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [Param::class];
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace usages of DateTime with DateTimeImmutable',
            []
        );
    }
}

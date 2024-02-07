<?php

declare(strict_types=1);

namespace Utils\Rector\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\Clone_;
use PHPStan\Type\ObjectType;
use Rector\Rector\AbstractRector;
// crop-start
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class RemoveCloneOnDateTimeRector extends AbstractRector
{
    /**
     * @param Clone_ $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $this->isObjectType(
            $node->expr,
            new ObjectType('DateTime')
        )) {
            return null;
        }

        return $node->expr;
    }

    // crop-end

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [Clone_::class];
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Remove clone on DateTime instances',
            []
        );
    }
}

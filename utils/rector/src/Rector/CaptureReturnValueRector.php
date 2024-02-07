<?php

declare(strict_types=1);

namespace Utils\Rector\Rector;

use PhpParser\Node;
use PHPStan\Type\ObjectType;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Rector\AbstractRector;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Assign;

final class CaptureReturnValueRector extends AbstractRector implements ConfigurableRectorInterface
{
    /**
     * @var array<array{class-string, string}>
     */
    private array $classMethodPairs = [];

    /**
     * @param array<array{class-string, string}> $configuration
     */
    public function configure(array $configuration): void
    {
        $this->classMethodPairs = $configuration;
    }

    // crop-start

    /**
     * @param MethodCall $node
     */
    public function refactor(Node $node): ?Node
    {
        if ($node->getAttribute(
            AttributeKey::IS_ASSIGNED_TO
        ) !== null) {
            return null;
        }

        foreach ($this->classMethodPairs as [$class, $method]) {
            if (! $this->isName($node->name, $method)) {
                continue;
            }
            if (! $this->isObjectType(
                $node->var,
                new ObjectType($class)
            )) {
                continue;
            }
            if (! $this->isObjectType(
                $node,
                new ObjectType($class)
            )) {
                continue;
            }
            return new Assign($node->var, $node);
        }

        return null;
    }

    // crop-end

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [MethodCall::class];
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Capture the return value of class::method()',
            []
        );
    }
}

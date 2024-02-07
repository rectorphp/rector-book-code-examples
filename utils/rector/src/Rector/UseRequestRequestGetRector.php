<?php

declare(strict_types=1);

namespace Utils\Rector\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\PropertyFetch;
use PHPStan\Type\ObjectType;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class UseRequestRequestGetRector extends AbstractRector
{
    // crop-start

    /**
     * @param MethodCall $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $this->isName($node->name, 'get')) {
            return null;
        }

        if (! $this->isObjectType(
            $node->var,
            new ObjectType('Symfony\Component\HttpFoundation\Request')
        )) {
            return null;
        }

        /*
         * Make the original method call on the fetched `request`
         * property instead:
         */
        $node->var = new PropertyFetch($node->var, 'request');

        return $node;
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
            'Use $request->request->get() instead of $request->get()',
            []
        );
    }
}

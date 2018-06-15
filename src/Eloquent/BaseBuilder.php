<?php

namespace Grimzy\LaravelMysqlSpatial\Eloquent;

use Illuminate\Database\Query\Builder;

class BaseBuilder extends Builder
{
    protected function cleanBindings(array $bindings)
    {
        $bindings = array_map(function ($binding) {
            return $binding instanceof SpatialExpression ? $binding->getSpatialValue() : $binding;
        }, $bindings);

        return parent::cleanBindings($bindings);
    }
}

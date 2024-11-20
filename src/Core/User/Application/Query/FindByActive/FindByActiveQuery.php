<?php

namespace App\Core\User\Application\Query\FindByActive;

class FindByActiveQuery
{
    public function __construct(public readonly bool $active) {}
}

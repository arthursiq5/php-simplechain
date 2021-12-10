<?php

namespace Arthursiq5\PhpSimplechain\Struct;

interface AuditableBlockInterface
{
    public function isNextValid(self $block): bool;
    public function isBeforeValid(self $block): bool;
}

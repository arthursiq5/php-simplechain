<?php

namespace Arthursiq5\PhpSimplechain\Struct;

interface BlockInterface
{
    public function isNextValid(self $block): bool;
    public function generateHash(): void;
}

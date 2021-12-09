<?php

namespace Arthursiq5\PhpSimplechain\Chain;

use Arthursiq5\PhpSimplechain\Struct\BlockInterface;

interface BlockchainInterface
{
    public function add(BlockInterface $block): void;
    public function last(): BlockInterface;
    public function blocks(): array;
    public function size(): int;
}

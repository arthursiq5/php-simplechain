<?php

namespace Arthursiq5\PhpSimplechain\Chain;

use Arthursiq5\PhpSimplechain\Struct\BaseBlock as Block;
use Arthursiq5\PhpSimplechain\Struct\BlockInterface;

class Blockchain implements BlockchainInterface
{
    private $blocks = [];

    public function __construct(Block $genesisBlock)
    {
        $this->blocks[] = $genesisBlock;
    }

    public function add(BlockInterface $block): void
    {
        $this->blocks[] = $block;
    }
    public function last(): Block
    {
        return end($this->blocks);
    }
    public function blocks(): array
    {
        return $this->blocks;
    }
    public function size(): int
    {
        return count($this->blocks);
    }
}

<?php

namespace Arthursiq5\PhpSimplechain\Chain;

use Arthursiq5\PhpSimplechain\Struct\BaseBlock as Block;
use Arthursiq5\PhpSimplechain\Struct\BlockInterface;

/**
 * @property Block[] $blocks
 */
class Blockchain implements BlockchainInterface
{
    private array $blocks = [];

    public function __construct(Block $genesisBlock)
    {
        $this->blocks[] = $genesisBlock;
    }

    public function add(BlockInterface $block): void
    {
        $this->blocks[] = $block;
    }
    public function isValid(): bool
    {
        $count = count($this->blocks()) -1;
        for($i = 0; $i < $count; $i++) {
            if (!$this->blocks[$i]->isNextValid($this->blocks[$i + 1])) {
                return false;
            }
        }
        return true;
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

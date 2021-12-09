<?php

namespace Arthursiq5\PhpSimplechain\Test\Chain;

use Arthursiq5\PhpSimplechain\Chain\Blockchain;
use Arthursiq5\PhpSimplechain\Struct\BaseBlock as Block;
use PHPUnit\Framework\TestCase;

class BlockchainTest extends TestCase
{
    private Blockchain $blockchain;

    public function setUp(): void
    {
        parent::setUp();
        $this->blockchain = new Blockchain(new Block());
    }

    public function test_add_new_blocks(): void
    {
        $lastBlock = $this->blockchain->last();
        $newBlock = new Block($lastBlock->index + 1, $lastBlock->hash, 'My test block');

        $this->blockchain->add($newBlock);
        $this->assertEquals($this->blockchain->last()->hash, $newBlock->hash);
        $this->assertEquals($this->blockchain->last()->index, $newBlock->index);
    }
}

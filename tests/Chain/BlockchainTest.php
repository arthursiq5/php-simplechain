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

    public function test_blockchain_is_valid(): void
    {
        $lastBlock = $this->blockchain->last();
        $newBlock = new Block($lastBlock->index + 1, "c666e1a82b8627690120cc43dbe79e9ec94ba5c3f6207d7c2f53cfa03e9db0b9", 'My test block');

        $this->blockchain->add($newBlock);
        $this->assertFalse($this->blockchain->isValid());
    }
}

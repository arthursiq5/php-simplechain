<?php

namespace Arthursiq5\PhpSimplechain\Test\Struct;

use Arthursiq5\PhpSimplechain\Struct\BaseBlock;
use PHPUnit\Framework\TestCase;

class BaseBlockTest extends TestCase
{
    public function test_generate_first_block():void
    {
        $block = new BaseBlock();
        $this->assertEquals(0, $block->index);
        $this->assertEquals('', $block->previousHash);
        $this->assertEquals('First Block', $block->data);
    }

    public function test_generate_second_block(): void
    {
        $block1 = new BaseBlock();
        $block2 = new BaseBlock(1, $block1->hash, 'Second Block');
        $this->assertEquals($block1->hash, $block2->previousHash);
    }

    public function test_next_valid(): void
    {
        $block1 = new BaseBlock();
        $block2 = new BaseBlock(1, $block1->hash, 'Second Block');
        $block3 = new BaseBlock(2, $block2->hash, 'Third Block');
        
        // testing default operations
        $this->assertTrue($block1->isNextValid($block2));
        $this->assertTrue($block2->isNextValid($block3));
        $this->assertFalse($block1->isNextValid($block3));
    }

    public function test_before_valid(): void
    {
        $block1 = new BaseBlock();
        $block2 = new BaseBlock(1, $block1->hash, 'Second Block');
        $block3 = new BaseBlock(2, $block2->hash, 'Third Block');
        
        // testing default operations
        $this->assertTrue($block2->isBeforeValid($block1));
        $this->assertTrue($block3->isBeforeValid($block2));
        $this->assertFalse($block3->isBeforeValid($block1));
    }
}

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
}

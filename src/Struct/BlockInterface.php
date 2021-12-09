<?php

namespace Arthursiq5\PhpSimplechain\Struct;

interface BlockInterface
{
    public function generateHash(): void;
    public function calculateHash(): string;
}

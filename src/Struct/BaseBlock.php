<?php

namespace Arthursiq5\PhpSimplechain\Struct;

use DateTime;

class BaseBlock implements BlockInterface
{
    private int $index;
    private string $previousHash;
    private string $hash;
    private $data;
    private int $timestamp;

    public function __construct(
        int $index = 0,
        string $previousHash = '',
        $data = 'First Block'
    )
    {
        $this->index = $index;
        $this->previousHash = $previousHash;
        $this->data = $data;
        $date = new DateTime();
        $this->timestamp = $date->getTimestamp();
    }

    public function __get($name)
    {
        return $this->$name;
    }

    private function getHashData(): string
    {
        return "" 
            . $this->index
            . $this->previousHash
            . json_encode($this->data)
            . $this->timestamp;
    }

    public function generateHash(): void
    {
        $this->hash = hash('sha256', $this->getHashData());
    }
}

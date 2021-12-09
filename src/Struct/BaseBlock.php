<?php

namespace Arthursiq5\PhpSimplechain\Struct;

use DateTimeImmutable;

/**
 * @property int $index
 * @property string $previousHash
 * @property string $hash
 * @property string $data
 * @property int $timestamp
 */
class BaseBlock implements BlockInterface
{
    public const HASH_ALGORITHM = 'sha256';

    private int $index;
    private string $previousHash;
    private string $hash;
    private string $data;
    private DateTimeImmutable $createdAt;

    public function __construct(
        int $index = 0,
        string $previousHash = '',
        $data = 'First Block'
    )
    {
        $this->index = $index;
        $this->previousHash = $previousHash;
        $this->data = $data;
        $this->createdAt = new DateTimeImmutable();

        $this->generateHash();
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
            . $this->createdAt->getTimestamp();
    }

    public function generateHash(): void
    {
        $this->hash = $this->calculateHash();
    }

    public function calculateHash(): string
    {
        return hash(self::HASH_ALGORITHM, $this->getHashData());
    }

    public function isNextValid(BlockInterface $block): bool
    {
        if ($block->index !==  $this->index + 1) {
            return false;
        }

        if ($block->previousHash !== $this->hash) {
            return false;
        }

        if ($block->hash !== $block->calculateHash()) {
            return false;
        }

        return true;
    }
}

<?php

namespace App\Domain\Entities;

class DgtRequirements
{
    private string $code;
    private string $fileExtension;
    private int $fileMaxSize;
    private bool $isAdditional = false;

    /**
     * @param string $code
     * @param string $fileExtension
     * @param int $fileMaxSize
     * @param bool $isAdditional
     */
    public function __construct(
        string $code,
        string $fileExtension,
        int $fileMaxSize,
        bool $isAdditional = false)
    {
        $this->code = $code;
        $this->fileExtension = $fileExtension;
        $this->fileMaxSize = $fileMaxSize;
        $this->isAdditional = $isAdditional;
    }

    public static function create(
        string $code,
        string $fileExtension,
        int $fileMaxSize): DgtRequirements
    {
        return new DgtRequirements($code, $fileExtension, $fileMaxSize);
    }


    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return DgtRequirements
     */
    public function setCode(string $code): DgtRequirements
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileExtension(): string
    {
        return $this->fileExtension;
    }

    /**
     * @param string $fileExtension
     * @return DgtRequirements
     */
    public function setFileExtension(string $fileExtension): DgtRequirements
    {
        $this->fileExtension = $fileExtension;
        return $this;
    }

    /**
     * @return int
     */
    public function getFileMaxSize(): int
    {
        return $this->fileMaxSize;
    }

    /**
     * @param int $fileMaxSize
     * @return DgtRequirements
     */
    public function setFileMaxSize(int $fileMaxSize): DgtRequirements
    {
        $this->fileMaxSize = $fileMaxSize;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAdditional(): bool
    {
        return $this->isAdditional;
    }

    /**
     * @param bool $isAdditional
     * @return DgtRequirements
     */
    public function setIsAdditional(bool $isAdditional): DgtRequirements
    {
        $this->isAdditional = $isAdditional;
        return $this;
    }
}

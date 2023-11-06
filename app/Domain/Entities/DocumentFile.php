<?php

namespace App\Domain\Entities;

use App\Domain\Enums\StatusType;
use DateTimeImmutable;

class DocumentFile
{
    private string $name;
    private string $type;
    private string $path;
    private string $extension;
    private StatusType $status;

    private DateTimeImmutable $uploadedAt;
    private ?DateTimeImmutable $signedAt;
    private DateTimeImmutable $processedAt;

    private User $uploadedBy;
    private Procedure $procedure;
    private DgtRequirements $dgtRequirements;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DocumentFile
     */
    public function setName(string $name): DocumentFile
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return DocumentFile
     */
    public function setType(string $type): DocumentFile
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return DocumentFile
     */
    public function setPath(string $path): DocumentFile
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     * @return DocumentFile
     */
    public function setExtension(string $extension): DocumentFile
    {
        $this->extension = $extension;
        return $this;
    }

    /**
     * @return StatusType
     */
    public function getStatus(): StatusType
    {
        return $this->status;
    }

    /**
     * @param StatusType $status
     * @return DocumentFile
     */
    public function setStatus(StatusType $status): DocumentFile
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getUploadedAt(): DateTimeImmutable
    {
        return $this->uploadedAt;
    }

    /**
     * @param DateTimeImmutable $uploadedAt
     * @return DocumentFile
     */
    public function setUploadedAt(DateTimeImmutable $uploadedAt): DocumentFile
    {
        $this->uploadedAt = $uploadedAt;
        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getSignedAt(): ?DateTimeImmutable
    {
        return $this->signedAt;
    }

    /**
     * @param DateTimeImmutable|null $signedAt
     * @return DocumentFile
     */
    public function setSignedAt(?DateTimeImmutable $signedAt): DocumentFile
    {
        $this->signedAt = $signedAt;
        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getProcessedAt(): DateTimeImmutable
    {
        return $this->processedAt;
    }

    /**
     * @param DateTimeImmutable $processedAt
     * @return DocumentFile
     */
    public function setProcessedAt(DateTimeImmutable $processedAt): DocumentFile
    {
        $this->processedAt = $processedAt;
        return $this;
    }

    /**
     * @return User
     */
    public function getUploadedBy(): User
    {
        return $this->uploadedBy;
    }

    /**
     * @param User $uploadedBy
     * @return DocumentFile
     */
    public function setUploadedBy(User $uploadedBy): DocumentFile
    {
        $this->uploadedBy = $uploadedBy;
        return $this;
    }

    /**
     * @return Procedure
     */
    public function getProcedure(): Procedure
    {
        return $this->procedure;
    }

    /**
     * @param Procedure $procedure
     * @return DocumentFile
     */
    public function setProcedure(Procedure $procedure): DocumentFile
    {
        $this->procedure = $procedure;
        return $this;
    }

    /**
     * @return DgtRequirements
     */
    public function getDgtRequirements(): DgtRequirements
    {
        return $this->dgtRequirements;
    }

    /**
     * @param DgtRequirements $dgtRequirements
     * @return DocumentFile
     */
    public function setDgtRequirements(DgtRequirements $dgtRequirements): DocumentFile
    {
        $this->dgtRequirements = $dgtRequirements;
        return $this;
    }

}

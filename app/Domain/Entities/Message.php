<?php

namespace App\Domain\Entities;

use App\Domain\Enums\DocumentFileTypes;
use App\Domain\Enums\ProcedureType;

class Message
{
    private string $code;
    private string $text;
    private DocumentFileTypes $type;
    private ProcedureType $procedureType;


    /**
     * @param string $code
     * @param string $text
     * @param DocumentFileTypes $type
     * @param ProcedureType $procedureType
     */
    public function __construct(string $code, string $text, DocumentFileTypes $type, ProcedureType $procedureType)
    {
        $this->code = $code;
        $this->text = $text;
        $this->type = $type;
        $this->procedureType = $procedureType;
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
     * @return Message
     */
    public function setCode(string $code): Message
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Message
     */
    public function setText(string $text): Message
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return DocumentFileTypes
     */
    public function getType(): DocumentFileTypes
    {
        return $this->type;
    }

    /**
     * @param DocumentFileTypes $type
     * @return Message
     */
    public function setType(DocumentFileTypes $type): Message
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return ProcedureType
     */
    public function getProcedureType(): ProcedureType
    {
        return $this->procedureType;
    }

    /**
     * @param ProcedureType $procedureType
     * @return Message
     */
    public function setProcedureType(ProcedureType $procedureType): Message
    {
        $this->procedureType = $procedureType;
        return $this;
    }

    public function description(): string
    {
        return $this->obtainString("descriptions");
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->obtainString("titles");
    }

    /**
     * @param string $group
     * @return string
     */
    private function obtainString(string $group): string
    {
        $procedure = strtolower($this->procedureType->value);
        $key = $this->type->value;

        $location = "{$procedure}-{$group}.{$key}";

        return __($location);
    }
}

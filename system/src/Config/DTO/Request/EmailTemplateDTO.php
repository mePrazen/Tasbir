<?php

namespace Src\Config\DTO\Request;


use Src\Shared\DTO\Constructor;

class EmailTemplateDTO extends Constructor
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $subject;

    /**
     * @var string
     */
    public string $message;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var string|null
     */
    public string|null $image;
}


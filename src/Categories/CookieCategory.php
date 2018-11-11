<?php

namespace Elhebert\Croustillon\Categories;

abstract class CookieCategory
{
    /** @var int */
    protected $value;

    /** @var string */
    protected $description;

    /** @var bool */
    public $mandatory = false;

    public function name(): string
    {
        if (property_exists($this, 'name')) {
            return $this->name;
        }

        return trim(preg_replace('/[A-Z]/', ' $0', class_basename($this)));
    }

    public function description(): string
    {
        return $this->description;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function mandatory(): bool
    {
        return $this->mandatory;
    }
}

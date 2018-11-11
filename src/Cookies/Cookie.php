<?php

namespace Elhebert\Croustillon\Cookies;

abstract class Cookie
{
    /** @var string */
    public $name;

    /** @var string */
    public $duration;

    /** @var string */
    public $category;

    /** @var string */
    public $source;

    /** @var string */
    public $purpose;

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): string
    {
        return $this->duration;
    }

    public function category(): string
    {
        return class_basename($this->category);
    }

    public function source(): string
    {
        return $this->source;
    }

    public function purpose(): string
    {
        return $this->purpose;
    }
}

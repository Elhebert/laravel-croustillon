<?php

namespace Elhebert\Croustillon\Exceptions;

class CreateCookieFailed extends \Exception
{
    public static function invalidCookie($cookie): self
    {
        $className = get_class($cookie);

        return new self("The Cookie class `{$className}` is not valid.");
    }
}

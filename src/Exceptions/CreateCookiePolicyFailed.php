<?php

namespace Elhebert\Croustillon\Exceptions;

class CreateCookiePolicyFailed extends \Exception
{
    public static function invalidPolicy($policy): self
    {
        $className = get_class($policy);

        return new self("The Cookie Policy class `{$className}` is not valid.");
    }
}

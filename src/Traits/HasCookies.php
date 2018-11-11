<?php

namespace Elhebert\Croustillon\Traits;

use Illuminate\Support\Collection;
use Elhebert\Croustillon\Cookies\Cookie;
use Elhebert\Croustillon\Exceptions\CreateCookieFailed;

trait HasCookies
{
    /** @var \Elhebert\Croustillon\Cookies\Cookie[] */
    protected $cookies = [];

    public function addCookie(string $cookie): self
    {
        $this->guardAgainstInvalidCookies($cookie);

        if (!$this->alreadyPresent($cookie)) {
            $this->cookies[] = app($cookie);
        }

        return $this;
    }

    /**  @throws \Elhebert\Croustillon\Exceptions\CreateCookieFailed */
    protected function guardAgainstInvalidCookies(string $cookie)
    {
        $cookie = app($cookie);

        if (!is_a($cookie, Cookie::class, true)) {
            throw CreateCookieFailed::invalidCookie($cookie);
        }
    }

    public function getCookies(): Collection
    {
        return collect($this->cookies);
    }

    private function alreadyPresent(string $className): bool
    {
        return $this->getCookies()->filter(function ($cookie) use ($className) {
            return class_basename($cookie) === $className;
        })->count() > 0;
    }
}

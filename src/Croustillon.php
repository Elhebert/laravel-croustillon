<?php

namespace Elhebert\Croustillon;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;
use Elhebert\Croustillon\Policies\Policy;
use Elhebert\Croustillon\Categories\CookieCategory;
use Elhebert\Croustillon\Exceptions\CreateCookiePolicyFailed;

class Croustillon
{
    /** @var \Elhebert\Croustillon\Policies\Policy */
    private $policy;

    /** @var \Illuminate\Support\Collection */
    private $categories;

    public function __construct()
    {
        $this->categories = $this->getCategoriesFromConfig();
    }

    /** @throw \Elhebert\Croustillon\Exceptions\CreateCookiePolicyFailed */
    public function registerNewPolicy(?string $className = null)
    {
        if (empty($className)) {
            $className = config('croustillon.policy');
        }

        $policy = app($className);

        if (!is_a($policy, Policy::class, true)) {
            throw CreateCookiePolicyFailed::invalidPolicy($policy);
        }

        $policy->configure();

        $this->policy = $policy;
    }

    public function categories(): Collection
    {
        return $this->categories;
    }

    public function mandatoryCategories(): Collection
    {
        return $this->categories()->filter(function ($category) {
            return $category->mandatory();
        });
    }

    public function minimumCookiePolicy(): int
    {
        return $this->mandatoryCategories()->reduce(function ($carry, $category) {
            return $carry += $category->value();
        });
    }

    public function category(string $category): CookieCategory
    {
        return $this->categories()[$category];
    }

    public function cookies(): Collection
    {
        return $this->policy->getCookies()->sortBy(function ($cookie) {
            return $this->category($cookie->category())->value();
        });
    }

    public function cookiesByCategory(): Collection
    {
        return $this->cookies()->groupBy(function ($cookie) {
            return $cookie->category();
        });
    }

    public function hasAcceptedPolicy(?int $policy = null): bool
    {
        $minimumCookiePolicy = $this->minimumCookiePolicy();

        $policy = $policy ?? $minimumCookiePolicy;

        $neededCookieLevel = decbin($policy);
        $acceptedCookies = decbin(Cookie::get(config('croustillon.policy_cookie')) ?? $minimumCookiePolicy);

        $regexp = str_replace('0', '[0-1]', $neededCookieLevel);

        return preg_match("/{$regexp}$/im", $acceptedCookies) === 1;
    }

    public function routes()
    {
    }

    private function getCategoriesFromConfig(): Collection
    {
        $classes = config('croustillon.types');

        return collect($classes)
            ->map(function ($className) {
                return new $className();
            })->keyBy(function ($class) {
                return class_basename($class);
            });
    }
}

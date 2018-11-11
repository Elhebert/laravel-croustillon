<?php

namespace Elhebert\Croustillon\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AddCookieBanner
{
    protected $addCookieBanner = true;

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (
            !$this->shouldAddCookieBannerToResponse()
            || Cookie::has(config('croustillon.policy_cookie'))
            || !$this->containsBodyTag($response)
        ) {
            return $response;
        }

        return $this->addBannerTo($response);
    }

    public function shouldAddCookieBannerToResponse(): bool
    {
        return $this->addCookieBanner;
    }

    protected function addBannerTo(Response $response): Response
    {
        $content = $response->getContent();
        $closingBodyTagPosition = $this->getLastClosingBodyTagPosition($content);
        $content = ''
            . substr($content, 0, $closingBodyTagPosition)
            . view('croustillon::banner')->render()
            . substr($content, $closingBodyTagPosition);

        return $response->setContent($content);
    }

    protected function containsBodyTag(Response $response): bool
    {
        return $this->getLastClosingBodyTagPosition($response->getContent()) !== false;
    }

    protected function getLastClosingBodyTagPosition(string $content = '')
    {
        return strripos($content, '</body>');
    }
}

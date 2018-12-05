<?php

namespace Elhebert\Croustillon\Tests;

class CookiePolicyTest extends TestCase
{
    /** @test */
    public function it_saves_the_chosen_cookie_policy()
    {
        $this->post(route('croustillon.cookies.store'), ['cookie-choice' => [1, 2, 4]])
            ->assertRedirect()
            ->assertCookie('cookie_policy', 7);
    }

    /** @test */
    public function it_force_the_mandatory_cookies_even_if_not_selected()
    {
        $this->post(route('croustillon.cookies.store'), ['cookie-choice' => [2, 4]])
            ->assertRedirect()
            ->assertCookie('cookie_policy', 7);
    }
}

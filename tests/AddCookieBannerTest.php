<?php

namespace Elhebert\Croustillon\Tests;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Route;
use Elhebert\Croustillon\Cookies\Cookie;
use Elhebert\Croustillon\Policies\Policy;
use Elhebert\Croustillon\Categories\Analytics;
use Elhebert\Croustillon\Categories\Mandatory;
use Elhebert\Croustillon\Http\Middlewares\AddCookieBanner;

class AddCookieBannerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        app(Kernel::class)->pushMiddleware(AddCookieBanner::class);

        Route::get('test-route', function () {
            return '<html><body>ok</body></html>';
        });
    }

    /** @test */
    public function the_default_configuration_will_show_the_cookie_banner()
    {
        $this->get('test-route')
            ->assertSuccessful()
            ->assertSee(trans('croustillon::cookies.banner.title'));
    }

    /** @test */
    public function it_does_not_add_the_cookie_banner_if_the_cookie_is_already_present()
    {
        $this->call('GET', 'test-route', [], ['cookie_policy' => 1])
            ->assertSuccessful()
            ->assertDontSee(trans('croustillon::cookies.banner.title'));
    }

    /** @test */
    public function using_an_invalid_policy_class_will_throw_an_exception()
    {
        $this->withoutExceptionHandling();

        $invalidPolicyClassName = get_class(new class {
        });

        config(['croustillon.policy' => $invalidPolicyClassName]);

        /*
         * The exception is always returned as an ErrorException
         * instead of the CreateCookiePolicyFailed
         *
         * Possible explaination:
         * @see https://github.com/laravel/ideas/issues/956
         */
        $this->expectException(\ErrorException::class);
        $this->get('test-route')
            ->assertSuccessful();
    }

    /** @test */
    public function it_show_all_the_cookie_categories_present_in_the_policy()
    {
        $this->withoutExceptionHandling();

        $policy = new class extends Policy {
            public function configure()
            {
                $this->addCookie(get_class(
                        new class extends Cookie {
                            public $category = Mandatory::class;
                        }
                    ))
                    ->addCookie(get_class(
                        new class extends Cookie {
                            public $category = Analytics::class;
                        }
                    ));
            }
        };

        config(['croustillon.policy' => get_class($policy)]);

        $this->get('test-route')
            ->assertSuccessful()
            ->assertSee((new Mandatory)->name())
            ->assertSee((new Analytics)->name());
    }
}

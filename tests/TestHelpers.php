<?php


namespace Tests;

use App\Http\Middleware\EncryptCookies;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Assert;

trait TestHelpers
{
    public function registerResponseMacros()
    {
        TestResponse::macro('assertViewIsPassed', function ($value) {
            Assert::assertArrayHasKey($value, $this->getOriginalContent()->getData());
        });

        TestResponse::macro('assertContains', function ($value) {
            Assert::assertRegExp("/$value/mi", $this->getContent());
        });

        TestResponse::macro('assertNotContains', function ($value) {
            Assert::assertNotRegExp("/$value/mi", $this->getContent());
        });
    }

    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct()
            {
            }
            public function report(\Exception $e)
            {
            }
            public function render($request, \Exception $e)
            {
                throw $e;
            }
        });
    }

    protected function disableCookiesEncryption(array $cookies)
    {
        $this->app->resolving(EncryptCookies::class,
            function ($object) use ($cookies) {
                foreach ($cookies as $cookie) {
                    $object->disableFor($cookie);
                }
            });

        return $this;
    }

    protected function protectTestEnvironment()
    {
        if (! $this->protectTestEnvironment) {
            return;
        }

        if ("testing" !== $this->app->environment()) {
            throw new \Exception('Make sure your testing environment is properly set. You are now running tests in the ['.$this->app->environment().'] environment');
        }

        if (DB::getName() != "testing" && DB::getName() != "setup") {
            throw new \Exception('Make sure to use a dedicated testing database connection. Currently you are using ['.DB::getName().']. Are you crazy?');
        }
    }

    protected function getResponseData($response, $key)
    {
        return $response->getOriginalContent()->getData()[$key];
    }



    protected function verifyMailRender(MailMessage $mailMessage): void
    {
        $flag = false;

        view($mailMessage->view, $mailMessage->viewData)->render(function () use (&$flag) {
            $flag = true;
        });

        $this->assertTrue($flag, 'Mail [' . $mailMessage->view . '] view could\'nt be rendered!');
    }
}

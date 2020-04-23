<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Cookie\QueueingFactory as CookieJar;
use Thinktomorrow\Cookies\AcceptCookie;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class CookieAccept
{

    /**
     * The cookie jar instance.
     *
     * @var \Illuminate\Contracts\Cookie\QueueingFactory
     */
    protected $cookies;

    /**
     * Create a new CookieQueue instance.
     *
     * @param  \Illuminate\Contracts\Cookie\QueueingFactory  $cookies
     * @return void
     */
    public function __construct(CookieJar $cookies)
    {
        $this->cookies = $cookies;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $cookieNames = $this->getCookieNames($request, $response);

        $this->removeCookies($cookieNames, $response);

        return $response;
    }

    /**
     * @param $request
     * @param $response
     * @return array
     */
    private function getCookieNames($request, $response): array
    {
        $existingCookieNames = $request->cookie();
        $newCookies = $response->headers->getCookies();
        $newCookieNames = collect($newCookies)->map->getName()->flip()->toArray();

        $cookieNames = array_keys(array_merge($existingCookieNames, $newCookieNames));

        return $cookieNames;
    }

    /**
     * @param $cookieNames
     * @param $response
     */
    private function removeCookies($cookieNames, $response)
    {
        if (in_array('cookie-accept', $cookieNames) || app(AcceptCookie::class)->exists()) return;

        // DAMN YOU REALLY DON'T WANNA SHOP HUH So let's remove all queued cookies if the cookie-accept cookie isn't
        foreach ($cookieNames as $cookieName)
        {
            $response->headers->removeCookie($cookieName);
        }
    }
}

<?php

namespace App\System;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class MailLogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(MailLog::class, function($app){
            return new MailLog($app['log']->driver('mail'));
        });

        Event::listen('Illuminate\Mail\Events\MessageSending', 'App\System\MailLog@onSendingMessage');
        Event::listen('Illuminate\Mail\Events\MessageSent', 'App\System\MailLog@onSentMessage');
    }
}

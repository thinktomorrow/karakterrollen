<?php

namespace Tests\Unit;

use Illuminate\Log\Events\MessageLogged;
use Illuminate\Log\Logger;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class MailLogTest extends TestCase
{
    /** @test */
    function it_can_log_a_mail_before_sending()
    {
        Event::fake([MessageLogged::class]);

        event(new MessageSending((new \Swift_Message('onderwerp','foobar'))
            ->addTo('foo@example.com')
            ->addFrom('bar@example.com')
        ));

        Event::assertDispatched(MessageLogged::class, function($event){
            $this->assertEquals('info', $event->level);
            $this->assertEquals('Sending mail | onderwerp | to: foo@example.com | from: bar@example.com', $event->message);

            return true;
        });
    }

    /** @test */
    function it_can_log_a_mail_after_sending()
    {
        Event::fake([MessageLogged::class]);

        event(new MessageSent((new \Swift_Message('onderwerp','foobar'))
            ->addTo('foo@example.com')
            ->addFrom('bar@example.com')
        ));

        Event::assertDispatched(MessageLogged::class, function($event){
            $this->assertEquals('info', $event->level);
            $this->assertEquals('Mail sent | onderwerp | to: foo@example.com | from: bar@example.com', $event->message);

            return true;
        });
    }
}

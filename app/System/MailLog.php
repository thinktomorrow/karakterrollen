<?php declare(strict_types=1);

namespace App\System;

use Illuminate\Log\Logger;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Mail\Events\MessageSent;

class MailLog
{
    /** @var Logger */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function onSendingMessage(MessageSending $event)
    {
        $message = implode(' | ', [
            'Sending mail',
            $event->message->getSubject(),
            'to: ' . (is_array($event->message->getTo()) ? implode(',', array_keys($event->message->getTo())) : $event->message->getTo()),
            'from: ' . (is_array($event->message->getFrom()) ? implode(',', array_keys($event->message->getFrom())) : $event->message->getFrom()),
        ]);

        $this->logger->info($message);
    }

    public function onSentMessage(MessageSent $event)
    {
        $message = implode(' | ', [
            'Mail sent',
            $event->message->getSubject(),
            'to: ' . (is_array($event->message->getTo()) ? implode(',', array_keys($event->message->getTo())) : $event->message->getTo()),
            'from: ' . (is_array($event->message->getFrom()) ? implode(',', array_keys($event->message->getFrom())) : $event->message->getFrom()),
        ]);

        $this->logger->info($message);
    }
}
